<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseRegistration;

class Student extends Model
{
    use HasFactory;

    protected $with = ['course_registration', 'transaction'];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course_registration() {
        return $this->hasOne(CourseRegistration::class);
    }

    public function venture() {
        return $this->hasOne(Venture::class);
    }

    public function transaction() {
        return $this->hasOne(Transaction::class);
    }

    public static function systemNumber() {
        $prefix = "EDC";
        $number = rand().substr(str_replace(' ', '' , time()), 0, 4);
        return $prefix.$number;
    }

}
