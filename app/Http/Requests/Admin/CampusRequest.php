<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class CampusRequest extends FormRequest
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
           'campus.name'=>'required',
    ];
    $request = Request::capture();
    $intakearray=$request->get('campus');
    if(empty($intakearray)) {//new intake
        $rules['campus.name'] = ['required', Rule::unique('campuses', 'name')];

    }
    else{//update
        $rules['campus.name'] = ['required', Rule::unique('campuses', 'name')->ignore(id: $intakearray['id'])];

    }
    return $rules;
   }
   public function messages()
   {
    return [
     'campus.name.required'=>'Intake Name required',

    ];
   }
}
