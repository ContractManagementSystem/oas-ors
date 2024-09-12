<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'theme',
        'date',
        'venue',
        'region',
        'is_published',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; 

    protected $casts = [
        'is_published' => 'boolean',
        'no' => 'integer',
    ];
}
