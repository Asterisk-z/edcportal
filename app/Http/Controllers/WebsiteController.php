<?php

namespace App\Http\Controllers;

use App\Service\ArrayToXml;
use App\Models\AppSetting;
use App\Models\CourseRegistration;
use App\Models\Courses;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\PaymentNotification;
use App\Models\Student;
use App\Models\Token;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Venture;
use DOMDocument;
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
        dump(PaymentNotification::all());
        dump(Venture::all());
        dump(Courses::all());
        dump(Student::all());
        dump(Transaction::all());
        dump(CourseRegistration::all());
        dump(Faculty::all());
        dump(Department::all());
        dump(Token::all());
        dd(User::all());
        return Inertia::renderWeb('Website/Index');
    }

}
