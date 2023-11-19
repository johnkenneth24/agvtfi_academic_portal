<?php

namespace App\Http\Requests\User\Student;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    $userId = $this->route('user');

    return [
      'school_id' => ['required', Rule::unique('users')->ignore($userId)],
      'admission_date' => 'required',
      'firstname' => 'required',
      'middlename' => 'nullable',
      'lastname' => 'nullable',
      'suffix' => 'nullable',
      'age' => 'required',
      'gender' => 'required',
      'birthdate' => 'required',
      'contact' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
      'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
      'address' => 'required',
      'year_level' => 'nullable'
    ];
  }
}
