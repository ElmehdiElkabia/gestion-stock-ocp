<?php

namespace App\Imports;

use App\Models\Consomable;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ConsomableImport implements ToModel, WithHeadingRow
{    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info('Processing row: ' . json_encode($row, JSON_PRETTY_PRINT));
    
        $validator = Validator::make($row, [
            'code_article' => ['string'],
            'description' => ['string'],
            'affectation_sa' => ['string'],
            'date_reception' => ['date', 'date_format:Y-m-d'],
            'date_fin_garantie' => ['date', 'date_format:Y-m-d'],
            'numero_commande' => ['string'],
            'fournisseur' => ['string'],
            'numero_bille' => ['string'],
            'quantite' => ['numeric', 'min:0'],
            'suivre_secrete' => ['numeric', 'min:0'],
            'dms_pves' => 'nullable',
            'cout' => 'nullable', 'numeric', 'min:0',
            'emplacement' => 'string'
        ]);
    
        if ($validator->fails()) {
            Log::error('Validation failed for row: ' . print_r($validator->errors()->all(), true)); // Log validation errors
            return null;
        }
    
        Log::info('Creating model instance for row...');
        
        $consomable = new Consomable([
            'code_article' => $row['code_article'],
            'description' => $row['description'],
            'affectation_SA' => $row['affectation_sa'],
            'date_reception' => $row['date_reception'],
            'date_fin_garantie' => $row['date_fin_garantie'],
            'numero_commande' => $row['numero_commande'],
            'fournisseur' => $row['fournisseur'],
            'numero_bille' => $row['numero_bille'],
            'quantite' => $row['quantite'],
            'suivre_sucrete' => $row['suivre_secrete'],
            'DMS_PVES' => $row['dms_pves'],
            'cout' => $row['cout'],
            'emplacement' => $row['emplacement'],
        ]);
       
        Log::info('Model instance created successfully.');
     
        return $consomable;
    }
    
}