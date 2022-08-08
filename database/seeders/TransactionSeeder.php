<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::all();

        foreach ($students as $student ) {


            Transaction::create([
                'name' => $student->fullName,
                'department' => $student->department,
                'regNumber' => $student->metricNumber,
                'paymentCode' => $student->paymentCode,
                'systemNumber' => $student->systemNumber,
                'venture' => $student->course_registration->venture,
                'items' => $student->course_registration->courses,
                'totalAmount' => "1500",
                'student_id' => $student->id,
                'actualAmount' => '1000'
            ]);

        }
    }
}
