<?php

namespace Database\Seeders;

use App\Models\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courses::create([
            'title' => 'ENTREPRENEURSHIP AND YOUTH DEVELOPMENT',
            'code' => 'GST102',
            'unit' => '2',
            'level' => '100',
            'fee' => '1000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);
        Courses::create([
            'title' => 'ENTREPRENEURSHIP EDUCATION',
            'code' => 'GST202',
            'unit' => '2',
            'level' => '200',
            'fee' => '5000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);
        Courses::create([
            'title' => 'ENTREPRENEURSHIP PRACTICAL',
            'code' => 'GST302',
            'unit' => '2',
            'level' => '300',
            'fee' => '1000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);

        Courses::create([
            'title' => 'ENTREPRENEURSHIP AND YOUTH DEVELOPMENT ',
            'code' => 'GST102_CARRYOVER',
            'unit' => '2',
            'level' => '100',
            'fee' => '1000',
            'isCarryOver' => 'YES',
            'semester' => 'second'
        ]);
        Courses::create([
            'title' => 'ENTREPRENEURSHIP EDUCATION ',
            'code' => 'GST202_CARRYOVER',
            'unit' => '2',
            'level' => '200',
            'fee' => '5000',
            'isCarryOver' => 'YES',
            'semester' => 'second'
        ]);
        Courses::create([
            'title' => 'ENTREPRENEURSHIP PRACTICAL ',
            'code' => 'GST302_CARRYOVER',
            'unit' => '2',
            'level' => '300',
            'fee' => '1000',
            'isCarryOver' => 'YES',
            'semester' => 'second'
        ]);
    }
}
