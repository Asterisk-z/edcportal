<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseRegistration;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course_registration() {
        return $this->hasMany(CourseRegistration::class);
    }

    public static function systemNumber() {
        $prefix = "EDC";
        $number = rand().substr(str_replace(' ', '' , time()), 0, 4);
        return $prefix.$number;
    }

}
