<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applevel extends Model
{
    protected $guarded = [];
const BACHELOR_LEVEL='Bachelor';
const DIPLOMA_LEVEL= 'Diploma';
const MASTER_LEVEL= 'Master';
const CERTIFICATE_LEVEL= 'Certificate';
const POSTGRADUATE_LEVEL= 'Postgraduate Diploma';
    use HasFactory;
}
