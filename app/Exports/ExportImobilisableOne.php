<?php

namespace App\Exports;

use App\Models\Imobilisable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportImobilisableOne implements FromCollection, WithHeadings
{
    protected $imobilsable;

    public function __construct(Imobilisable $imobilsable)
    {
        $this->imobilsable = $imobilsable;
    }

    public function headings(): array
    {
        return [
            'Code Matricule',
            'Description',
            'Ref. Matricule',
            'Unite',
            'Destination',
            'Quantite Total',
            'Quantite Demandee',
            'Pump',
            'Valeur',
        ];
    }

    public function collection()
    {
        // Fetch the specific imobilsable passed to the export
        $imobilsable = $this->imobilsable;

        // Map the fetched data to the desired fields
        $data = [
            [
                'Code Matricule' => $imobilsable->code_matricule,
                'Description' => $imobilsable->description,
                'Ref. Article' => null, 
                'Unite' => null, 
                'Destination' => null, 
                'Quantite Total' => null, 
                'Quantite Demandee' =>$imobilsable->quantite, 
                'Pump' => null, 
                'Valeur' => null, 
            ]
        ];

        return collect($data);
    }
}


// ExportImobilisableOne