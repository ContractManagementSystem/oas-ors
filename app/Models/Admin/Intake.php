<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Intake extends Model
{
    use HasFactory;
protected $guarded = [];

    const INTAKE_OCTOBER='October Intake';
    const INTAKE_MARCH= 'March Intake';
    public function scopeList(){
        return DB::table('intakes','int')->
        join('academic_years as acad','acad.id','=','int.acy')
        ->select(['int.*','acad.name as academic']);

   }
}
