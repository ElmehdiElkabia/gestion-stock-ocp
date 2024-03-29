<?php

namespace App\Http\Controllers;

use App\Models\Affictation;
use App\Models\History;
use App\Models\Imobilisable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImobilisableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $imobilisables = Imobilisable::all();
        return view('table.table-imobilisable', compact('imobilisables'));
    }

    public function securite()
    {
        $Securite = Imobilisable::all();
        return view('table.table-suivre-securite-imobilisable', compact('Securite'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $affectations = Affictation::all();
        return view('formulaire.create-imobilisable', compact('affectations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'pdf_file_path' => 'nullable|file|max:5120', // 5MB maximum size (in kilobytes)
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       if ($request->input('affectation_SA') === 'other') {
    // Create a new Affectation record with the provided name
    $affectation = Affictation::create(['option' => $request->input('other_affectation')]);

    // Set the affectation id in the $data array
    $data['affectation_SA'] = $affectation->id;
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
        $imobilisable = Imobilisable::create($data);
        $this->logHistory(Auth::user()->id, 'created', 'imobilisable', $imobilisable);
        return redirect()->route('imobilisables.index')->with('success', 'imobilisable created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $imobilisable = Imobilisable::findOrFail($id);
        $affectations = Affictation::all();
    
        if ($request->has('SortieQuantité')) {
            $request->validate([
                'SortieQuantité' => 'required|numeric|min:1',
            ]);
    
            $imobilisable->quantite -= $request->input('SortieQuantité');
            $imobilisable->save();
    
            // Log the history for the sortie action
            $this->logHistory(Auth::user()->id, 'sortie', 'imobilisable', $imobilisable);
    
            return redirect()->route('imobilisables.index')->with('success', 'Quantity updated successfully.');
        }
    
        return view('pages.show-imobilsable', compact('imobilisable', 'affectations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $imobilisable = Imobilisable::findOrFail($id);
        $affectations = Affictation::all();
        return view('formulaire.edite-imobilisable', compact('imobilisable', 'affectations'));
    }
    public function exit($id)
    {
        $imobilisable = Imobilisable::findOrFail($id);
        return view('exit-form', compact('imobilisable'));
    }
    /**
     * update commande
     */
    public function commande(string $id, Request $request)
{
    $affectations = Affictation::all();
    $imobilisable = Imobilisable::findOrFail($id);

    // Check if the form is submitted and process the new data
    if ($request->has('newQuantity') || $request->has('newNumerobille')) {
        // Validate the request data
        $request->validate([
            'newQuantity' => 'nullable|numeric', // Adjust validation rules as needed
            'newNumerobille' => 'nullable|string', // Adjust validation rules as needed
        ]);

        // Update the imobilisable's quantity if provided
        if ($request->has('newQuantity')) {
            $imobilisable->quantite += $request->input('newQuantity');
        }

        // Update the imobilisable's "Numero Bille" if provided
        if ($request->has('newNumerobille')) {
            // Concatenate the existing "numero_bille" with the new value with a separator
            $newNumerobille = $request->input('newNumerobille');
            $separator = '/'; // You can change this to any separator you prefer
            $imobilisable->numero_bille = $imobilisable->numero_bille . $separator . $newNumerobille;
        }

        // Save the changes to the imobilisable
        $imobilisable->save();

        // Log the history for the commande action
        $this->logHistory(Auth::user()->id, 'commande', 'imobilisable', $imobilisable);

        // Redirect back or to another page as needed
        return redirect()->route('imobilisables.index')->with('success', 'Update imobilisable successfully.');
    }

    return view('formulaire.commande-imobilisable', compact('imobilisable','affectations'));
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $imobilisable = Imobilisable::findOrFail($id);
        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'pdf_file_path' => 'nullable|file|max:5120', // 5MB maximum size (in kilobytes)
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       if ($request->input('affectation_SA') === 'other') {
    // Create a new Affectation record with the provided name
    $affectation = Affictation::create(['option' => $request->input('other_affectation')]);

    // Set the affectation id in the $data array
    $data['affectation_SA'] = $affectation->id;
}

        if ($request->hasFile('pdf_file_path')) {
            $file = $request->file('pdf_file_path');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('pdf_files', $fileName, 'public');

            // Delete the existing file if it exists
            if ($imobilisable->pdf_file_path) {
                Storage::disk('public')->delete($imobilisable->pdf_file_path);
            }

            $data['pdf_file_path'] = $filePath;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imagePath = $image->storeAs('images', $imageName, 'public');

            // Delete the existing image if it exists
            if ($imobilisable->image) {
                Storage::disk('public')->delete($imobilisable->image);
            }

            $data['image'] = $imagePath;
        }


        $imobilisable->update($data);

        // Log history
        $this->logHistory(Auth::user()->id, 'updated', 'imobilisable', $imobilisable);

        return redirect()->route('imobilisables.index')->with('success', 'imobilisable updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $imobilisable = Imobilisable::findOrFail($id);
        $imobilisable->delete();

        $this->logHistory(Auth::user()->id, 'deleted', 'Imobilisables', $imobilisable);
        return redirect()->route('imobilisables.index')->with('success', 'imobilisables deleted successfully.');
    }
    protected function logHistory($userId, $action, $tableName, $data)
    {
        $code_matricule = isset($data['code_matricule']) ? $data['code_matricule'] : null;
        History::create([
            'user_id' => $userId,
            'action' => $action,
            'table_name' => $tableName,
            'data' => json_encode($data),
            'code_matricule' => $code_matricule,
        ]);
    }
}
