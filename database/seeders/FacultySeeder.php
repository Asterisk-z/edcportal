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
        $faculty = Faculty::create([
            'name' => 'PHYSICAL SCIENCES'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'PURE AND APPLIED CHEMISTRY',
            'faculty_id' => $faculty->id
        ],[
            'name' => 'COMPUTER SCIENCE',
            'faculty_id' => $faculty->id
        ],[
            'name' => 'GEOLOGY',
            'faculty_id' => $faculty->id
        ],[
            'name' => 'MATHEMATICS',
            'faculty_id' => $faculty->id
        ],[
            'name' => 'PHYSICS',
            'faculty_id' => $faculty->id
        ],[
            'name' => 'STATISTICS',
            'faculty_id' => $faculty->id
        ]]);

        $faculty = Faculty::create([
            'name' => 'MANAGEMENT SCIENCES'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'ACCOUNTING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'BANKING AND FINANCE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'BUSINESS MANAGEMENT',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MARKETING',
            'faculty_id' => $faculty->id,
        ],]);


        $faculty = Faculty::create([
            'name' => 'SOCIAL SCIENCES'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'POLITICAL SCIENCE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'SOCIOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'SOCIAL WORK',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'ECONOMICS',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'POLICY AND ADMINISTRATIVE STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'TOURISM STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'PUBLIC ADMINISTRATION',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'LAW'
        ]);
        $faculty->departments()->create([
             'name' => 'LAW',
        ]);



        $faculty = Faculty::create([
            'name' => 'AGRICULTURE, FORESTRY AND WILDLIFE RESOURCE MANAGEMENT'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'AGRICULTURAL ECONOMICS',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'AGRICULTURAL EXTENSION AND RURAL SOCIOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'ANIMAL SCIENCE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'CROP SCIENCE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'SOIL SCIENCE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'FORESTRY AND WILDLIFE RESOURCE MANAGEMENT',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'FOOD SCIENCE AND TECHNOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'FOOD SCIENCE AND TECHNOLOGY',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'BASIC MEDICAL SCIENCE'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'HUMAN ANATOMY',
            'faculty_id' => 6,
        ],
        [
            'name' => 'BIOCHEMISTRY',
            'faculty_id' => 6,
        ],
        [
            'name' => 'HUMAN NUTRITION AND DIETETICS',
            'faculty_id' => 6,
        ],
        [
            'name' => 'PHYSIOLOGY',
            'faculty_id' => 6,
        ],
        [
            'name' => 'PHARMACOLOGY',
            'faculty_id' => 6,
        ],
        ]);



        $faculty = Faculty::create([
            'name' => 'ALLIED MEDICAL SCIENCES'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'MEDICAL LABORATORY SCIENCE',
            'faculty_id' => 7,
        ],[
            'name' => 'NURSING SCIENCE',
            'faculty_id' => 7,
        ],[
            'name' => 'PUBLIC HEALTH SCIENCE',
            'faculty_id' => 7,
        ],[
            'name' => 'RADIOGRAPHY AND RADIOLOGICAL SCIENCE',
            'faculty_id' => 7,
        ],[
            'name' => 'PHYSIOTHERAPY',
            'faculty_id' => 7,
        ],]);



        $faculty = Faculty::create([
            'name' => 'BIOLOGICAL SCIENCES'
        ]);
        $faculty->departments()->insert([
            [
            'name' => 'BOTANY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'GENETICS AND BIOTECHNOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MICROBIOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'ZOOLOGY AND ENVIRONMENTAL BIOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'SCIENCE AND LABORATORY TECHNOLOGY',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'DENTISTRY'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'DENTISTRY',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'ARTS AND SOCIAL SCIENCE EDUCATION'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'ARTS EDUCATION',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'SOCIAL SCIENCE EDUCATION',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'CONTINUING EDUCATION AND DEVELOPMENT STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'LIBRARY AND INFORMATION SCIENCE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'ENVIRONMENTAL EDUCATION',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'EDUCATIONAL FOUNDATION STUDIES'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'EDUCATIONAL FOUNDATION',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'EDUCATION MANAGEMENT',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'GUIDANCE AND COUNSELLING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'CURRICULUM AND TEACHING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'SPECIAL EDUCATION',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'VOCATIONAL AND SCIENCE EDUCATION'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'SCIENCE EDUCATION',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'HUMAN KINETICS AND HEALTH EDUCATION',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'VOCATIONAL EDUCATION',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'ENGINEERING'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'COMPUTER ENGINEERING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'CIVIL AND ENVIRONMENTAL ENGINEERING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MECHANICAL ENGINEERING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'AGRICULTURAL ENGINEERING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'ELECTRICAL AND ELECTRONICS ENGINEERING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'CHEMICAL ENGINEERING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'PETROLEUM ENGINEERING',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'ENVIRONMENTAL SCIENCES'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'ENVIRONMENTAL RESOURCE MANAGEMENT',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'URBAN AND REGIONAL PLANNING',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'GEOGRAPHY AND ENVIRONMENTAL RESOURCE MANAGEMENT',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'ARCHITECTURE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'SURVEYING SCIENCE AND GEOINFORMATICS',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'ESTATE MANAGEMENT',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'GEOINFORMATICS AND REMOTE SENSING',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'PHARMACY'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'PHARMACY',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'OCEANOGRAPHY'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'MARINE BIOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'PHYSICAL OCEANOGRAPHY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'BIOLOGICAL OCEANOGRAPHY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MARINE SCIENCE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MARINE CHEMISTRY',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'ARTS'
        ]);
        $faculty->departments()->insert([

        [
            'name' => 'ENGLISH & LITERARY STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'FINE AND APPLIED ARTS',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'HISTORY & INTERNATIONAL STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'LINGUISTICS AND COMMUNICATION STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MODERN LANGUAGES AND TRANSLATION STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MUSIC',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'RELIGIOUS AND CULTURAL STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'PHILOSOPHY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'THEATRE AND MEDIA STUDIES',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MASS COMMUNICATIONS',
            'faculty_id' => $faculty->id,
        ],]);



        $faculty = Faculty::create([
            'name' => 'CLINICAL SCIENCE'
        ]);
        $faculty->departments()->insert([
        [
            'name' => 'INTERNAL MEDICINE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'SURGERY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'PEDIATRICS',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'COMMUNITY MEDICINE',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'FAMILY MEDICINE',
            'faculty_id' => $faculty->id,
        ],]);




        $faculty = Faculty::create([
            'name' => 'BASIC CLINICAL SCIENCES'
        ]);
        $faculty->departments()->insert([

        [
            'name' => 'CHEMICAL PATHOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'PHARMACOLOGY AND THERAPEUTICS',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'ANAESTHESIOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'CHEMICAL PATHOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'HAEMATOLOGY',
            'faculty_id' => $faculty->id,
        ],[
            'name' => 'MEDICAL MICROBIOLOGY/PARASITOLOGY',
            'faculty_id' => $faculty->id,
        ],]);



    }
}
