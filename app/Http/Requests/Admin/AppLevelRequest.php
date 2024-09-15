<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class AppLevelRequest extends FormRequest
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
           'level.name'=>'required',

    ];
    $request = Request::capture();
    $intakearray=$request->get('level');
    if(empty($intakearray)) {//new intake
        $rules['level.name'] = ['required', Rule::unique('applevels', 'name')];
     }
    else{//update
        $rules['level.name'] = ['required', Rule::unique('applevels', 'name')->ignore(id: $intakearray['id'])];

    }
    return $rules;
   }
   public function messages()
   {
    return [
     'level.name.required'=>'Application level  required',
    ];
   }
}