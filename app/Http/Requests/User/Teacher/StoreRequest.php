<?php

namespace App\Http\Requests\User\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
      return [
        'school_id' => 'required|unique:users',
        'admission_date' => 'nullable',
        'firstname' => 'required',
        'middlename' => 'nullable',
        'lastname' => 'nullable',
        'suffix' => 'nullable',
        'gender' => 'required',
        'birthdate' => 'required',
        'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
        'email' => 'required|string|email|max:255|unique:users',
        'address' => 'required',
      ];
    }
}