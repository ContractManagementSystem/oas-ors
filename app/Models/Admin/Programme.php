<?php

namespace App\Models\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function scopeList(){
        return DB::table("programmes","p")
        ->join('intakes as int','int.id','=','p.intake_id')
        ->join('campuses as camp','camp.id','=','p.campus_id')
        ->join('academic_years as aca','aca.id','=','p.acyr')
        ->join('applevels as app','app.id','=','p.app_level')
        ->select(['p.*','camp.name as cname','aca.name as acayear','int.name as intname',
        'app.name as appname']);
    }
}