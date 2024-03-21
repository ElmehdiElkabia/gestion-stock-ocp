<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consomable extends Model
{
    use HasFactory;
    protected $table='consomables';
    protected $fillable = [
        'code_article',
        'description',
        'affectation_SA',
        'date_reception',
        'date_fin_garantie',
        'image',
        'numero_commande',
        'fournisseur',
        'numero_bille',
        'quantite',
        'suivre_sucrete',
        'DMS_PVES',
        'cout',
        'emplacement',
        'pdf_file_path',
    ];

   
}
