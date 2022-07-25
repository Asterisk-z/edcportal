<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdmitStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|string|min:5",
            "dob" => "required|string|min:5",
            "department" => "required|string|min:3",
            "faculty" => "required|string|min:3",
            "gender" => "required|string",
            "registrationNumber" =>  "required|string|min:5",
            "mobileNumber" =>  "required|integer|min:10",
        ];
    }

    public function  messages() {
        return [
            "name.required" => "Full Name is Required",
            "name.string" => "Full Name Must Be a String",
            "name.min" => "Full Name Can't be less than five characters",
            "dob.required" => "Date Of Birth is Required",
            "dob.string" => "Date Of Birth Must Be a String",
            "dob.min" => "Date Of Birth Can't be less than five characters",
            "department.required" => "Department is Required",
            "department.string" => "Department Must Be a String",
            "department.min" => "Department Can't be less than five characters",
            "faculty.required" => "Faculty is Required",
            "faculty.string" => "Faculty Must Be a String",
            "faculty.min" => "Faculty Can't be less than five characters",
            "gender.required" => "Gender is Required",
            "gender.string" => "Gender Must Be a String",
            "gender.min" => "Gender Can't be less than five characters",
            "registrationNumber.required" => "Registration Number is Required",
            "registrationNumber.string" => "Registration Number Must Be a String",
            "registrationNumber.min" => "Registration Number Can't be less than five characters",
            "mobileNumber.required" => "Mobile Number is Required",
            "mobileNumber.integer" => "Mobile Number Must Be a Number",
            "mobileNumber.min" => "Mobile Number Can't be less than five characters",
        ];
    }
}
