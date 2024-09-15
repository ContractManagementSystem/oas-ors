<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class IntakeRequest extends FormRequest
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
           'intake.name'=>'required',
           'intake.acy'=> 'required',
    ];
    $request = Request::capture();
    $intakearray=$request->get('intake');
    if(empty($intakearray)) {//new intake
        $rules['intake.name'] = ['required', Rule::unique('intakes', 'name')];
        $rules['intake.acy'] = ['required', Rule:: unique('intakes','acy')];
    }
    else{//update
        $rules['intake.name'] = ['required', Rule::unique('intakes', 'name')->ignore(id: $intakearray['id'])];
  
    }
    return $rules;
   }
   public function messages()
   {
    return [
     'intake.name.required'=>'Intake Name required',
     'intake.acy.required'=> 'Academic year required',
    ];
   }
}
