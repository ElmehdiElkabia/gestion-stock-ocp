<?php

namespace App\Http\Controllers;

use App\Models\Affictation;
use App\Models\Consomable;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Exports\ConsomablesExport;
use Maatwebsite\Excel\Facades\Excel;



class ConsomableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consomables = Consomable::all();
        return view('table.table-consomable', compact('consomables'));
    }
    public function securite()
    {
        $consomablessecurite = Consomable::all();
        return view('table.page-suiteSecuriteC', compact('consomablessecurite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $affectations = Affictation::all();
        return view('formulaire.create-consomable', compact('affectations'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'pdf_file_path' => 'nullable|file|max:5120',
            'image' => 'nullable|image|max:5120',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->input('affectation_SA') === 'other') {
            $data['affectation_SA'] = $request->input('other_affectation');
        }

        // Handle PDF file upload
        if ($request->hasFile('pdf_file_path')) {
            $file = $request->file('pdf_file_path');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('pdf_files', $fileName, 'public');
            $data['pdf_file_path'] = $filePath;
        }
        // Handle image file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $imageName, 'public');
            $data['image'] = $imagePath;
        }

        $consomable = Consomable::create($data);
        $this->logHistory(Auth::user()->id, 'created', 'consomables', $consomable);

        return redirect()->route('consomables.index')->with('success', 'Consomable créé avec succès.');
    }
        public function export()
        {
            return Excel::download(new ConsomablesExport, 'consomables.xlsx');
        }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $affectations = Affictation::all();
        $consomable = Consomable::find($id);
        return view('table.page-showConsomable', compact('consomable', 'affectations'));
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $affectations = Affictation::all();
        $consomable = Consomable::find($id);
        return view('formulaire.edite-consomable', compact('consomable', 'affectations'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $consomable = Consomable::findOrFail($id);
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'pdf_file_path' => 'nullable|file|max:5120',
            'image' => 'nullable|image|max:5120',
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if ($request->input('affectation_SA') === 'other') {
            $data['affectation_SA'] = $request->input('other_affectation');
        }
        if ($request->hasFile('pdf_file_path')) {
            $file = $request->file('pdf_file_path');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('pdf_files', $fileName, 'public');

            // Delete the existing file if it exists
            if ($consomable->pdf_file_path) {
                Storage::disk('public')->delete($consomable->pdf_file_path);
            }

            $data['pdf_file_path'] = $filePath;
        }
         // Handle image file upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('images', $imageName, 'public');

        // Delete the existing image if it exists
        if ($consomable->image) {
            Storage::disk('public')->delete($consomable->image);
        }

        $data['image'] = $imagePath;
    }
        $consomable->update($data);

        // Log history
        $this->logHistory(Auth::user()->id, 'updated', 'consomables', $consomable);
        return redirect()->route('consomables.index')->with('success', 'consomable updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $consomable = Consomable::findOrFail($id);
        $consomable->delete();

        // Log history
        $this->logHistory(Auth::user()->id, 'deleted', 'consomables', $consomable);

        return redirect()->route('consomables.index')->with('success', 'Consomable deleted successfully.');
    }

    protected function logHistory($userId, $action, $tableName, $data)
    {
        $code_article = isset($data['code_article']) ? $data['code_article'] : null;

        History::create([
            'user_id' => $userId,
            'action' => $action,
            'table_name' => $tableName,
            'data' => json_encode($data),
            'code_article' => $code_article,
        ]);
    }
}
