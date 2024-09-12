<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Primary_menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'route',
        'external_url',
        'content',
        'no',
        'is_published',
        'menu_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; 

    protected $casts = [
        'is_published' => 'boolean',
        'no' => 'integer',
    ];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
