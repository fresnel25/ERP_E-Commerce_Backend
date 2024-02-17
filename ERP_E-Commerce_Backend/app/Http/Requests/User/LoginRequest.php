<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'name' => 'required',
            'email' => 'required|email|exists:users,email',  // on required un email, de format email, existant dans la table users au niveau de la colonne email
            'password' => 'required',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'status_code' => '422',
            'success' => 'false',
            'error' => 'true',
            'message' => 'erreur de validation',
            'errorsList' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return[
            'email.required' => 'Une adresse email doit etre fournie',
            'email.email' => 'Cette adresse ne respecte pas le format d\'un email',
            'email.exists' => 'Cette adresse n\'existe pas',
            'password.required' => 'un password doit etre fournie',
        ];
    }
}
