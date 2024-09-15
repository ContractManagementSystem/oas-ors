<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProgrammeRequest extends FormRequest
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
           'program.name'=>'required',
           'program.code'=>'required',
           'program.short'=>'required',
           'program.campus_id'=>'required',
           'program.intake_id'=>'required',
           'program.app_level'=>'required',
           'program.acyr'=>'required',



    ];
    $request = Request::capture();
    $intakearray=$request->get('program');
    if(empty($intakearray)) {//new programme
        $rules['program.name'] = ['required', Rule::unique('programmes', 'name')];

     }
    else{//update
        $rules['program.name'] = ['required', Rule::unique('programmes', 'name')->ignore(id: $intakearray['id'])];

    }
    return $rules;
   }
   public function messages()
   {
    return [
     'program.name.required'=>'programme name   required',
     'program.code.required'=>'programme code   required',
    'program.short.required'=>'programme short   required',
    'program.intake_id.required'=>'Intake name   required',
     'program.campus_id.required'=>'campus name   required',


    ];
   }
}