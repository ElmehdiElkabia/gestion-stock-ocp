<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affictation extends Model
{
    use HasFactory;
    protected $table='affictations';

    protected $fillable = [
        'option',
    ];
}
