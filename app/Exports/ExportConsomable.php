<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class ExportConsomable implements FromCollection, WithHeadings
{
    protected $Consomables;

    public function __construct(Collection $Consomables)
    {
        $this->Consomables = $Consomables;
    }

    public function headings(): array
    {
        return [
            'Code Article',
            'Description',
            'Affectation SA',
            'Date Réception',
            'Date Fin Garantie',
            'Numéro Commande',
            'Fournisseur',
            'Numéro Bille',
            'Quantité',
            'Suivre Secrete',
            'DMS PVES',
            'Coût',
            'Emplacement'
        ];
    }

    public function collection()
    {
        $data = [];

        foreach ($this->Consomables as $Consomables) {
            $data[] = [
                'Code Article' => $Consomables->code_article,
                'Description' => $Consomables->description,
                'Affectation SA' => $Consomables->affectation_SA,
                'Date Réception' => $Consomables->date_reception,
                'Date Fin Garantie' => $Consomables->date_fin_garantie,
                'Numéro Commande' => $Consomables->numero_commande,
                'Fournisseur' => $Consomables->fournisseur,
                'Numéro Bille' => $Consomables->numero_bille,
                'Quantité' => $Consomables->quantite,
                'Suivre Secrete' => $Consomables->suivre_sucrete,
                'DMS PVES' => $Consomables->DMS_PVES,
                'Coût' => $Consomables->cout,
                'Emplacement' => $Consomables->emplacement,
            ];
        }

        return collect($data);
    }
}
