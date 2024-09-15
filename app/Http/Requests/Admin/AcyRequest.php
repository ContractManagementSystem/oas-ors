<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class AcyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules= [
           'academic.name'=>'required',
    ];
    $request = Request::capture();
    $intakearray=$request->get('academic');
    if(empty($intakearray)) {//new intake
        $rules['academic.name'] = ['required', Rule::unique('academic_years', 'name')];

    }
    else{//update
        $rules['academic.name'] = ['required', Rule::unique('academic_years', 'name')->ignore(id: $intakearray['id'])];

    }
    return $rules;
   }
   public function messages()
   {
    return [
     'academic.name.required'=>'Intake Name required',

    ];
   }
}