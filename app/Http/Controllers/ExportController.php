<?php

namespace App\Http\Controllers;

use App\Exports\ExportConsomable;
use App\Exports\ExportConsomableOne;
use App\Exports\ExportImobilisable;
use App\Exports\ExportImobilisableOne;
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

    public function exportConsomableCommande($id)
    {
        $consomable = Consomable::find($id);

        if ($consomable) {
            return Excel::download(new ExportConsomableOne($consomable), 'Consomable_'.$consomable->code_article.'.xlsx');
        } else {
            return redirect()->back()->with('error', 'Consomable not found.');
        }
    }

    public function exportImobilisables()
    {
        $Imobilisables = Imobilisable::all();
        
        if ($Imobilisables->isNotEmpty()) {
            return Excel::download(new ExportImobilisable($Imobilisables), 'Imobilisables.xlsx');
        } else {
            return redirect()->back()->with('error', 'No records found.');
        }
    }

    public function exportImobilisableCommande($id)
    {
        $imobilisable = Imobilisable::find($id);

        if ($imobilisable) {
            return Excel::download(new ExportImobilisableOne($imobilisable), 'Imobilisable_'.$imobilisable->id.'.xlsx');
        } else {
            return redirect()->back()->with('error', 'Imobilisable not found.');
        }
    }
}
