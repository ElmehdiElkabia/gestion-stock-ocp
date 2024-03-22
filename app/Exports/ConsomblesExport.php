<?php

namespace App\Exports;

use App\Models\Consomable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsomablesExport implements FromCollection, WithHeadings
{
    protected $consomables;

    public function __construct(Collection $consomables)
    {
        $this->consomables = $consomables;
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

        foreach ($this->consomables as $consomable) {
            $data[] = [
                'Code Article' => $consomable->code_article,
                'Description' => $consomable->description,
                'Affectation SA' => $consomable->affectation_SA,
                'Date Réception' => $consomable->date_reception,
                'Date Fin Garantie' => $consomable->date_fin_garantie,
                'Numéro Commande' => $consomable->numero_commande,
                'Fournisseur' => $consomable->fournisseur,
                'Numéro Bille' => $consomable->numero_bille,
                'Quantité' => $consomable->quantite,
                'Suivre Secrete' => $consomable->suivre_sucrete,
                'DMS PVES' => $consomable->DMS_PVES,
                'Coût' => $consomable->cout,
                'Emplacement' => $consomable->emplacement,
            ];
        }

        return collect($data);
    }
}
