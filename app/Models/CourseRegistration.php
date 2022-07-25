<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegistration extends Model
{
    use HasFactory;

    protected $casts = [
        'courses' => 'array',
    ];

    public function student() {
        return $this->hasMany(Student::class);
    }

}
