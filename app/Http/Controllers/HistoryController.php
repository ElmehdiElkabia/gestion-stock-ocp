<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    
    public function index()
    {
        $histories = History::all();
        return view('table.table-history', compact('histories'));
    }

}
