<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('id', '2')->first();
        $user->students()->create([
            'fullName' => "caniel mes",
            'metricNumber' => $user->id."213121211",
            'email' => "dan@gmail.com",
            'sex' => "male",
            'phoneNumber'  => "233232312",
            'level' => "300",
            'sessionOfRegistration' => "2020/2021",
            'fingerprint' => Str::uuid(),
            'passport' => Str::uuid(),
            'systemNumber' => Student::systemNumber(),
            'paymentCode' => Str::uuid(),
            'programType' => "UME",
            'department' => "Law",
            'faculty' => "Law",
        ])->course_registration()->create([
                "courses" =>  [3],
                'year'    => env('SESSION'),
                'venture' =>  5
        ]);
        $user->students()->create([
            'fullName' => "caniel mes",
            'metricNumber' => $user->id."213121211",
            'email' => "dan@gmail.com",
            'sex' => "male",
            'phoneNumber'  => "233232312",
            'level' => "300",
            'sessionOfRegistration' => "2020/2021",
            'fingerprint' => Str::uuid(),
            'passport' => Str::uuid(),
            'systemNumber' => Student::systemNumber(),
            'paymentCode' => Str::uuid(),
            'programType' => "UME",
            'department' => "Law",
            'faculty' => "Law",
        ])->course_registration()->create([
                "courses" =>  [3],
                'year'    => env('SESSION'),
                'venture' =>  5
        ]);
        $user->students()->create([
            'fullName' => "caniel mes",
            'metricNumber' => $user->id."213121211",
            'email' => "dan@gmail.com",
            'sex' => "male",
            'phoneNumber'  => "233232312",
            'level' => "300",
            'sessionOfRegistration' => "2020/2021",
            'fingerprint' => Str::uuid(),
            'passport' => Str::uuid(),
            'systemNumber' => Student::systemNumber(),
            'paymentCode' => Str::uuid(),
            'programType' => "UME",
            'department' => "Law",
            'faculty' => "Law",
        ])->course_registration()->create([
                "courses" =>  [3],
                'year'    => env('SESSION'),
                'venture' =>  5
        ]);
        $user->students()->create([
            'fullName' => "caniel mes",
            'metricNumber' => $user->id."213121211",
            'email' => "dan@gmail.com",
            'sex' => "male",
            'phoneNumber'  => "233232312",
            'level' => "300",
            'sessionOfRegistration' => "2020/2021",
            'fingerprint' => Str::uuid(),
            'passport' => Str::uuid(),
            'systemNumber' => Student::systemNumber(),
            'paymentCode' => Str::uuid(),
            'programType' => "UME",
            'department' => "Law",
            'faculty' => "Law",
        ])->course_registration()->create([
                "courses" =>  [3],
                'year'    => env('SESSION'),
                'venture' =>  5
        ]);
    }
}
