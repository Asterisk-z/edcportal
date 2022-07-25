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
            'code' => 'GST 102',
            'unit' => '2',
            'level' => '100',
            'fee' => '1000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);
        Courses::create([
            'title' => 'ENTREPRENEURSHIP EDUCATION',
            'code' => 'GST 202',
            'unit' => '2',
            'level' => '200',
            'fee' => '5000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);
        Courses::create([
            'title' => 'ENTREPRENEURSHIP TRADE SKILLS',
            'code' => 'GST 302',
            'unit' => '2',
            'level' => '300',
            'fee' => '1000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);

        Courses::create([
            'title' => 'ENTREPRENEURSHIP AND YOUTH DEVELOPMENT',
            'code' => 'GST 102',
            'unit' => '2',
            'level' => '100',
            'fee' => '1000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);
        Courses::create([
            'title' => 'ENTREPRENEURSHIP EDUCATION',
            'code' => 'GST 202',
            'unit' => '2',
            'level' => '200',
            'fee' => '5000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);
        Courses::create([
            'title' => 'ENTREPRENEURSHIP TRADE SKILLS',
            'code' => 'GST 302',
            'unit' => '2',
            'level' => '300',
            'fee' => '1000',
            'isCarryOver' => 'NO',
            'semester' => 'second'
        ]);
    }
}
