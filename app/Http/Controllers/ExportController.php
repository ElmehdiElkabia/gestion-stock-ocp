<?php

namespace App\Http\Controllers;
use App\Exports\ConsomablesExport;
use App\Models\Consomable;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    
    public function exportConsomables()
    {
        $consomable = Consomable::all();
        
        if ($consomable->isNotEmpty()) {
            return Excel::download(new ConsomablesExport($consomable), 'consomables.xlsx');
        } else {
            return redirect()->back()->with('error', 'No records found.');
        }
    }
}
