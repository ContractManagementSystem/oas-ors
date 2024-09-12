<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Submenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'route',
        'external_url',
        'is_published',
        'primary_menu_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; 

    protected $casts = [
        'is_published' => 'boolean',
    ];

    public function primary_menu(){
        return $this->belongsTo(Primary_menu::class);

    }
    }
