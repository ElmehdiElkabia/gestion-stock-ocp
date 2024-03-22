<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    
    public function index()
    {
        $histories = History::orderBy('created_at', 'desc')->paginate(10);
        return view('table.table-history', compact('histories'));
    }

}
