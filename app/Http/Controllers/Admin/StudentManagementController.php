<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmitStudentRequest;
use App\Models\Courses;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use App\Models\Student;
use App\Models\Venture;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Illuminate\Support\Str;


class StudentManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render('Admin/Student/Index', [
                'students' => Student::orderBy('created_at', "desc")->paginate(15)->withQueryString()->through(fn ($student) => [
                    'id'    => $student->id,
                    'name'  => $student->fullName,
                    'level' => $student->level,
                    'email' => $student->email,
                    'edcNumber'     => $student->systemNumber,
                    'department'    => $student->department,
                    "faculty"       => $student->faculty,
                    "courses"       => $student->course_registration,
                    "registrationNumber" => $student->registration_number,
                ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        return Inertia::render('Admin/Student/Registration', [
                'faculties' => Faculty::orderBy('name', "asc")->get()->map(function ($faculty) {
                    return [
                        'id' => $faculty->id,
                        'name' => Str::title($faculty->name),
                    ];
                }),
                'ventures' => Venture::orderBy('name', "asc")->get()->map(function ($venture) {
                    return [
                        'id' => $venture->id,
                        'name' => Str::title($venture->name),
                        'fee' => number_format($venture->fee, 2),
                    ];
                }),
                'courses' => Courses::where('isCarryOver', 'NO')->orderBy('level', "desc")->get()->map(function ($courses) {
                    return [
                        'id' => $courses->id,
                        'title' => Str::title($courses->title),
                        'code' => $courses->code,
                        'level' => $courses->level,
                        'fee' => number_format($courses->fee, 2),
                    ];
                }),
                'retakeCourses' => Courses::where('isCarryOver', 'YES')->orderBy('level', "desc")->get()->map(function ($courses) {
                    return [
                        'id' => $courses->id,
                        'title' => Str::title($courses->title),
                        'code' => $courses->code,
                        'level' => $courses->level,
                        'fee' => number_format($courses->fee, 2),
                    ];
                })
        ]);
    }

    /**
     * Verify the payment code
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyPayment(Request $request)
    {

        if (Student::where('paymentCode', request('paymentCode'))->exists()) {
             throw ValidationException::withMessages([
                'paymentCode' => __('Payment Used for another student'),
            ]);
        }

        // $re = file_get_contents('https://myunical.edu.ng/verifyfee/GetSchoolFee.ashx?pin='.request('paymentCode'));
        // $res = json_decode($re, true);

    	// if ($res['status'] == 'success') {

		// 	$name = $res['data']['fullname'];
        //     $regNumber = $res['data']['mat_no'];
		// 	$faculty = $res['data']['faculty'];
		// 	$department = $res['data']['department'];
		// 	$level = $res['data']['level'];
		// 	$session = $res['data']['session'];

		// 	$data = [
		// 		'name' => Str::title($name),
		// 		'registration_number' => $regNumber,
		// 		'session' => $session,
		// 		'payment_code' => $res['data']['rec_no'],
		// 		'faculty' => Str::title($faculty),
		// 		'department' => Str::title($department),
		// 		'level' => $level,
		// 	];

		// }else {
		// 	$data = null;
		// }


			$data = [
				'name' => Str::title("JOHN FAVOUR BLESSING"),
				'registration_number' => "18/02245064",
				'session' => "2020/2021",
				'payment_code' => "033145214511632389913951",
				'faculty' => Str::title("ALLIED MEDICAL SCIENCES"),
				'department' => Str::title("NURSING SCIENCE"),
				'level' => '300',
			];

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function register(AdmitStudentRequest $request)
    public function register(Request $request)
    {
        // dd($request->all(), array_merge($request->coursesToRegister, $request->coursesToRetake));
        try {


            $student = Student::create([
                'fullName' => $request->apiData['name'],
                'metricNumber' => $request->confirmData['regNumber'],
                'email' => $request->confirmData['email'],
                'sex' => $request->confirmData['gender'],
                'phoneNumber' => $request->phoneNumber,
                'programType' => $request->programType,
                'level' => $request->confirmData['level'],
                'sessionOfRegistration' => $request->apiData['session'],
                'fingerprint' => Str::uuid(),
                'passport' => Str::uuid(),
                'systemNumber' => Student::systemNumber(),
                'paymentCode' => $request->apiData['payment_code'],
                'department' => $request->apiData['faculty'],
                'faculty' => $request->apiData['department'],
                'course_registration_id'  => "1",
            ])->course_registration()->create([
                'student_id' => '1',
                "courses" =>  array_merge($request->coursesToRegister, $request->coursesToRetake),
                'year' => $request->apiData['session'],
                'venture' => $request->venture
            ]);

            return redirect()->route('admin.students')->with('success' ,'Student Admission Successfull');

        } catch (\Throwable $th) {
            throw $th;
        }

    }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function getStudent()
        {
            $student = User::where('id', request('student'))->with('payments')->first();
            return Inertia::render('Admin/ViewStudent', [
                'student' => [
                        "id" => $student->id,
                        "name" => $student->name,
                        "email" => $student->email,
                        "registration_number" =>  $student->registration_number,
                        "department" => $student->department,
                        "faculty" => $student->faculty,
                        "gender" => $student->gender,
                        "sessionOfEnrolement" => $student->sessionOfEnrolement,
                        "dob" => $student->dob->format('d-m-Y'),
                        "mobileNumber" => $student->mobileNumber,
                        "dateOfAdmision" => $student->created_at->format('d-m-Y'),
                    ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
