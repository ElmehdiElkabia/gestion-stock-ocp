<?php

namespace App\Http\Controllers;

use App\Models\Consomable;
use App\Models\Imobilisable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ControllerPDF extends Controller
{
    public function downloadConsomablePdf($id)
    {
        $consomable = Consomable::find($id);
        
        if (!$consomable) {
            return redirect()->route('consomables.index')->with('error', 'Consomable not found.');
        }
    
        // Make sure the pdf_file_path is not null
        if (!$consomable->pdf_file_path) {
            return redirect()->route('consomables.index')->with('error', 'PDF file path not found for this consomable.');
        }
    
        // Get the full file path
        $pdfFilePath = storage_path('app/public/' . $consomable->pdf_file_path);

        // Check if the file exists
        if (!Storage::disk('public')->exists($consomable->pdf_file_path)) {
            return redirect()->route('consomables.index')->with('error', 'PDF file not found.');
        }
    
        // If everything is correct, download the file
        return response()->download($pdfFilePath, `$consomable->numero_bille .'.pdf'`);
    }
    public function downloadImobilisablePdf($id)
    {
        $imobilisables = Imobilisable::find($id);
        
        if (!$imobilisables) {
            return redirect()->route('imobilisables.index')->with('error', 'Imobilisable not found.');
        }
    
        // Make sure the pdf_file_path is not null
        if (!$imobilisables->pdf_file_path) {
            return redirect()->route('imobilisables.index')->with('error', 'PDF file path not found for this Imobilisable.');
        }
    
        // Get the full file path
        $pdfFilePath = storage_path('app/public/' . $imobilisables->pdf_file_path);

        // Check if the file exists
        if (!Storage::disk('public')->exists($imobilisables->pdf_file_path)) {
            return redirect()->route('imobilisables.index')->with('error', 'PDF file not found.');
        }
    
        // If everything is correct, download the file
        return response()->download($pdfFilePath, `$imobilisables->numero_bille.'.pdf'`);
    }
}