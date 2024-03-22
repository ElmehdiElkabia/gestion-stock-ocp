<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class ExportImobilisable implements FromCollection, WithHeadings
{
    protected $Imobilisables;

    public function __construct(Collection $Imobilisables)
    {
        $this->Imobilisables = $Imobilisables;
    }

    public function headings(): array
    {
        return [
            'Code Matricule',
            'Description',
            'Affectation SA',
            'Date Réception',
            'Date Fin Garantie',
            'Numéro Commande',
            'Fournisseur',
            'Numéro Bille',
            'Quantité',
            'Category',
            'Suivre Secrete',
            'DMS PVES',
            'Coût',
            'Emplacement'
        ];
    }

    public function collection()
    {
        $data = [];

        foreach ($this->Imobilisables as $Imobilisables) {
            $data[] = [
                'Code Matricule' => $Imobilisables->code_matricule,
                'Description' => $Imobilisables->description,
                'Affectation SA' => $Imobilisables->affectation_SA,
                'Date Réception' => $Imobilisables->date_reception,
                'Date Fin Garantie' => $Imobilisables->date_fin_garantie,
                'Numéro Commande' => $Imobilisables->numero_commande,
                'Fournisseur' => $Imobilisables->fournisseur,
                'Numéro Bille' => $Imobilisables->numero_bille,
                'Quantité' => $Imobilisables->quantite,
                'Category' => $Imobilisables->category,
                'Suivre Secrete' => $Imobilisables->suivre_sucrete,
                'DMS PVES' => $Imobilisables->DMS_PVES,
                'Coût' => $Imobilisables->cout,
                'Emplacement' => $Imobilisables->emplacement,
            ];
        }

        return collect($data);
    }
}
