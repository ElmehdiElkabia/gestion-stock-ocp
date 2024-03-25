<?php

namespace App\Exports;

use App\Models\Consomable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportConsomableOne implements FromCollection, WithHeadings
{
    protected $consomable;

    public function __construct(Consomable $consomable)
    {
        $this->consomable = $consomable;
    }

    public function headings(): array
    {
        return [
            'Code Article',
            'Description',
            'Ref. Article',
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
        // Fetch the specific consomable passed to the export
        $consomable = $this->consomable;

        // Map the fetched data to the desired fields
        $data = [
            [
                'Code Article' => $consomable->code_article,
                'Description' => $consomable->description,
                'Ref. Article' => null, 
                'Unite' => null, 
                'Destination' => null, 
                'Quantite Total' => null, 
                'Quantite Demandee' =>$consomable->quantite, 
                'Pump' => null, 
                'Valeur' => null, 
            ]
        ];

        return collect($data);
    }
}
