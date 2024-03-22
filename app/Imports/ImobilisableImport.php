<?php

namespace App\Imports;

use App\Models\Consomable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImobilisableImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $validator = Validator::make($row, [
            'Code Article' => 'required',
            'Description' => 'required',
            'Affectation SA' => 'required',
            'Date Réception' => 'required|date',
            'Date Fin Garantie' => 'required|date',
            'Numéro Commande' => 'required',
            'Fournisseur' => 'required',
            'Numéro Bille' => 'required',
            'Quantité' => 'required|numeric',
            'Suivre Secrete' => Rule::in(['non', 'oui']), 
            'DMS PVES' => 'nullable', 
            'Category'=>'required',
            'Coût' => 'nullable|numeric',
            'Emplacement' => 'required',
        ]);

        if ($validator->fails()) {
            return null;
        }

        
        return new Consomable([
            'code_article' => $row['Code Article'],
            'description' => $row['Description'],
            'affectation_SA' => $row['Affectation SA'],
            'date_reception' => $row['Date Réception'],
            'date_fin_garantie' => $row['Date Fin Garantie'],
            'numero_commande' => $row['Numéro Commande'],
            'fournisseur' => $row['Fournisseur'],
            'numero_bille' => $row['Numéro Bille'],
            'quantite' => $row['Quantité'],
            'suivre_sucrete' => $row['Suivre Secrete'],
            'emplacement' => $row['Emplacement'],
            'DMS_PVES' => $row['DMS PVES'],
            'cout' => $row['Coût'],
            'category' => $row['Category'],
        ]);
    
    }
}

// ImobilisableImport