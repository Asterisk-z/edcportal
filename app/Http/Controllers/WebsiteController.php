<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use App\Models\CourseRegistration;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dump(Student::all());
        // dump(CourseRegistration::all());
        // dump(Faculty::all());
        // dump(Department::all());
        // dump(Token::all());
        // dd(User::all());
        return Inertia::renderWeb('Website/Index');
    }

}
