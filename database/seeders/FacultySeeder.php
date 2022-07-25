<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::create([
            'name' => 'PHYSICAL SCIENCES'
        ]);
        Faculty::create([
            'name' => 'SOCIAL SCIENCES'
        ]);
        Faculty::create([
            'name' => 'MANAGEMENT SCIENCES'
        ]);
        Faculty::create([
            'name' => 'LAW'
        ]);
        Faculty::create([
            'name' => 'AGRICULTURE, FORESTRY AND WILDLIFE RESOURCE MANAGEMENT'
        ]);
        Faculty::create([
            'name' => 'BASIC MEDICAL SCIENCE'
        ]);
        Faculty::create([
            'name' => 'ALLIED MEDICAL SCIENCES'
        ]);
        Faculty::create([
            'name' => 'BIOLOGICAL SCIENCES'
        ]);
        Faculty::create([
            'name' => 'DENTISTRY'
        ]);
        Faculty::create([
            'name' => 'ARTS AND SOCIAL SCIENCE EDUCATION'
        ]);
        Faculty::create([
            'name' => 'EDUCATIONAL FOUNDATION STUDIES'
        ]);
        Faculty::create([
            'name' => 'VOCATIONAL AND SCIENCE EDUCATION'
        ]);
        Faculty::create([
            'name' => 'ENGINEERING'
        ]);
        Faculty::create([
            'name' => 'ENVIRONMENTAL SCIENCES'
        ]);
        Faculty::create([
            'name' => 'PHARMACY'
        ]);
        Faculty::create([
            'name' => 'OCEANOGRAPHY'
        ]);
        Faculty::create([
            'name' => 'ARTS'
        ]);
        Faculty::create([
            'name' => 'CLINICAL SCIENCE'
        ]);
        Faculty::create([
            'name' => 'BASIC CLINICAL SCIENCES'
        ]);
    }
}
