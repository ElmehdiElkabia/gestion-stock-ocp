<?php

namespace App\Exports;

use App\Models\Consomable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ConsomablesExport implements FromCollection
{
    public function collection()
    {
        return Consomable::all();
    }
}

