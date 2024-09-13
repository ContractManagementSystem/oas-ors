<?php

namespace Database\Seeders;

use App\Models\Admin\Academic_year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $acy=[
        [
        'id'=>1,
        'name'=>'2024/2025'

     ],
     [
        'id'=>2,
        'name'=>'2025/2026'

     ],
    ];
     Academic_year::insert($acy);
    }
}