<?php

namespace App\Http\Controllers;

use App\Models\Affictation;
use App\Models\Consomable;
use Illuminate\Http\Request;


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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $affectations = Affictation::all();
        return view('formulaire.create-consomable', compact('affectations'));
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
    
        Consomable::create($data);
    
        return redirect()->route('consomables.index')->with('success', 'Consomable created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consomable = Consomable::findOrFail($id);
        return view('consomables.index', compact('consomable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $affectations=Affictation::all();
        $consomable=Consomable::find($id);
        return view('formulaire.edite-consomable', compact('consomable' ,'affectations'));
    }
    
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $consomable = Consomable::findOrFail($id);
        $data = $request->all();
    
        if ($request->input('affectation_SA') === 'other') {
            $data['affectation_SA'] = $request->input('other_affectation');
        }
        $consomable->update($data);
        return redirect()->route('consomables.index')->with('success', 'consomable updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Consomable::destroy($id);
        return redirect()->route('consomable.index')->with('success', 'consomables deleted successfully.');
    }
}