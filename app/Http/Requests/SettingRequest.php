<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => 'required|string',
            'value' => 'required|string'
        ];
    }

    public function  messages() {
        return [
            "name.required" => "Name is Required",
            "name.string" => "Name Must Be a String",
            "value.required" => "Value is Required",
            "value.string" => "Value Must Be a String",
        ];
    }
}
