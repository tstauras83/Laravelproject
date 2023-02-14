<?php

namespace App\Http\Requests;

use App\Rules\PersonalCodeRule;
use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:4', 'max:255'],
            'surname' => ['required', 'string', 'min:4', 'max:255'],
            'personal_code' => ['required', 'integer', new PersonalCodeRule()],
            'email' => ['sometimes', 'string','min:4', 'max:255'],
            'phone' => ['sometimes', 'string','min:4', 'max:255'],
            'user_id' => ['sometimes', 'integer', 'exists:users,id']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

}
