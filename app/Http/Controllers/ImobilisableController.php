<?php

namespace App\Http\Controllers;

use App\Models\Affictation;
use App\Models\Imobilisable;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $affectations = Affictation::all();
        return view('formulaire.create-imobilisable' ,compact('affectations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
    
        if ($request->input('affectation_SA') === 'other') {
            $data['affectation_SA'] = $request->input('other_affectation');
        }
       Imobilisable::create($data);
        return redirect()->route('imobilisables.index')->with('success', 'imobilisable created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $imobilisable =Imobilisable::findOrFail($id);
        return view('imobilisables.show', compact('imobilisable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $imobilisable =Imobilisable::findOrFail($id);
        $affectations=Affictation::all();
        return view('formulaire.edite-imobilisable', compact('imobilisable','affectations'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $imobilisable =Imobilisable::findOrFail($id);
        $data = $request->all();
    
        if ($request->input('affectation_SA') === 'other') {
            $data['affectation_SA'] = $request->input('other_affectation');
        }
        $imobilisable->update($data);
        return redirect()->route('imobilisables.index')->with('success', 'imobilisable updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Imobilisable::destroy($id);
        return redirect()->route('imobilisables.index')->with('success', 'imobilisables deleted successfully.');
    }
}
