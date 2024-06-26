<?php

namespace App\Http\Controllers;

use App\Imports\ConsomableImport;
use App\Imports\ImobilisableImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log; // Import the Log facade

class ImportController extends Controller
{
    public function importConsomables(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);
        if ($request->file('file')->isValid()) {
            try {
                Log::info('Starting import process for Imobilisables...');
                Excel::import(new ConsomableImport, $request->file('file'));
                Log::info('Imobilisables imported successfully.');
                return redirect()->back()->with('success', 'File imported successfully.');
            } catch (\Exception $e) {
                Log::error('Error during Imobilisables import: ' . $e->getMessage());
                return redirect()->back()->with('error', 'An error occurred during file import.');
            }
        } else {
            return redirect()->back()->with('error', 'The uploaded file is not valid.');
        }
    }

    public function importImobilisables(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);

        if ($request->file('file')->isValid()) {
            try {
                Log::info('Starting import process for Imobilisables...');
                Excel::import(new ImobilisableImport, $request->file('file'));
                Log::info('Imobilisables imported successfully.');
                return redirect()->back()->with('success', 'File imported successfully.');
            } catch (\Exception $e) {
                Log::error('Error during Imobilisables import: ' . $e->getMessage());
                return redirect()->back()->with('error', 'An error occurred during file import.');
            }
        } else {
            return redirect()->back()->with('error', 'The uploaded file is not valid.');
        }
    }
}
