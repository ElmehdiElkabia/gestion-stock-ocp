<?php

namespace App\Imports;

use App\Models\Consomable;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ConsomableImport implements ToModel, WithHeadingRow
{
    protected $consomable;

    public function __construct($consomable)
    {
        $this->consomable = $consomable;
    }

    public function model(array $row)
    {
      
        Log::info('Processing row: ' . print_r($row, true)); // Log the row being processed

        $validator = Validator::make($row, [
            'Code Article' => 'string|required',
            'Description' => 'string|required',
            'Affectation SA' => 'string|required',
            'Date Réception' => 'required|date',
            'Date Fin Garantie' => 'required|date',
            'Numéro Commande' => 'string|required',
            'Fournisseur' => 'string|required',
            'Numéro Bille' => 'string|required',
            'Quantité' => 'string|required|numeric',
            'Suivre Secrete' => Rule::in(['non', 'oui']),
            'DMS PVES' => 'nullable',
            'Coût' => 'nullable|numeric',
            'Emplacement' => 'string|required',
        ]);

        if ($validator->fails()) {
            Log::error('Validation failed for row: ' . print_r($validator->errors()->all(), true)); // Log validation errors
            return null;
        }

        Log::info('Creating model instance for row...');
        
        $consomable = new Consomable([
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
            'DMS_PVES' => $row['DMS PVES'],
            'cout' => $row['Coût'],
            'emplacement' => $row['Emplacement'],
        ]);
       
        Log::info('Model instance created successfully.');
     
        return $consomable;
    }
}
