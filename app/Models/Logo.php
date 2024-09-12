<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'photo',
        'route',
        'is_published',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; 

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
