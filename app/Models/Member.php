<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'organization',
        'speaker_id',
        'conference_id',
        'photo',
        'is_published',
        'created_at',
        'updated_at',
        'deleted_at',
    ]; 

    protected $casts = [
        'is_published' => 'boolean',
    ];
    public function speaker(){
        return $this->belongsTo(Speaker::class);
    }
    public function conference(){
        return $this->belongsTo(Conference::class);
    }
}
