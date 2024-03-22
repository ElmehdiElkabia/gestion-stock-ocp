<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'table_name', 'action', 'data'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
