<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Students', [
                'students' => User::where('role', 'student')->orderBy('created_at', "desc")->paginate(15)->withQueryString()->through(fn ($student) => [
                    'id' => $student->id,
                    'name' => $student->name,
                    'email' => $student->email,
                    'department' => $student->department,
                    "faculty" => $student->faculty,
                    "registrationNumber" => $student->registration_number,
                ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addStudent()
    {
        return Inertia::render('Admin/AdmitStudent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStudent(AdmitStudentRequest $request)
    {
        try {

            if(User::where('registration_number', $request->registrationNumber)->exists()) {
                 throw ValidationException::withMessages([
                    'email' => 'Student Exist in database',
                ]);
            }

            User::create([
                'name' => $request->name,
                'email' => "".str::lower(str_replace(' ', '' , $request->name))."@magaretschools.com",
                'password' => Hash::make(Str::random(9)),
                'registration_number' => $request->registrationNumber,
                'mobileNumber'=> $request->mobileNumber,
                'department' => $request->department,
                'faculty' => $request->faculty,
                'gender' => $request->gender,
                'sessionOfEnrolement' => '2021/2022',
                'dob' => Carbon::createFromDate($request->dob),
            ])->payments()->create([
                'schoolFeeCode' => 'sfc'.str::random(4).substr(str_replace(' ', '' , "good bye to sapa"), 0, 4).Str::random(4).substr(str_replace(' ', '' , "good bye to sapa"), -4),
                'schoolFeeAmount' => '200000',
                'schoolFeeStatus' => 'NotPaid',
                'acceptanceFeeCode' => 'afc'.str::random(4).substr(str_replace(' ', '' , "good bye to sapa"), 0, 4).Str::random(4).substr(str_replace(' ', '' , "good bye to sapa"), -4),
                'acceptanceFeeAmount' => '200000',
                'acceptanceFeeAmount' => 'NotPaid',
                'departmentalFeeCode' => 'dfc'.str::random(4).substr(str_replace(' ', '' , "good bye to sapa"), 0, 4).Str::random(4).substr(str_replace(' ', '' , "good bye to sapa"), -4),
                'departmentalFeeAmount' => '200000',
                'departmentalFeeAmount' => 'NotPaid',
                'hostelFeeCode' => 'hfc'.str::random(4).substr(str_replace(' ', '' , "good bye to sapa"), 0, 4).Str::random(4).substr(str_replace(' ', '' , "good bye to sapa"), -4),
                'hostelFeeAmount' => '200000',
                'hostelFeeAmount' => 'NotPaid',
                'session' => '2021/2022',
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
