<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'photo',
        'description',
        'is_published',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; 

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
