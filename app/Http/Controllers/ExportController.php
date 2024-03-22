<?php
 
namespace App\Http\Controllers;

use App\Exports\ExportConsomable;
use App\Exports\ExportImobilisable;
use App\Models\Consomable;
use App\Models\Imobilisable;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class ExportController extends Controller
{
  
    public function exportConsomables()
    {
        $Consomables = Consomable::all();
        
        if ($Consomables->isNotEmpty()) {
            return Excel::download(new ExportConsomable($Consomables), 'Consomables.xlsx');
        } else {
            return redirect()->back()->with('error', 'No records found.');
        }
    }
    // exportImobilisables
    public function exportImobilisables()
    {
        $Imobilisables = Imobilisable::all();
        
        if ($Imobilisables->isNotEmpty()) {
            return Excel::download(new ExportImobilisable($Imobilisables), 'Imobilisables.xlsx');
        } else {
            return redirect()->back()->with('error', 'No records found.');
        }
    }
}
