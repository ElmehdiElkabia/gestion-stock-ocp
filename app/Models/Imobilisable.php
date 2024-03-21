<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imobilisable extends Model
{
    use HasFactory;
    protected $table='imobilisables';
    protected $fillable = [
        'code_matricule',
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
        'category',
        'emplacement',
        'pdf_file_path',
    ];
}
