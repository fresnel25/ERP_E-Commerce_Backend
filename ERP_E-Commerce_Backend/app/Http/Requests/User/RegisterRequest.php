<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            // 'image' => 'nullable|image|',
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
            'name.required' => 'Un nom doit etre fourni',
            'email.required' => 'Une adresse email doit etre fournie',
            'email.unique' => 'Cette adresse existe deja',
            'email.email' => 'Cette adresse ne respecte pas le format d\'un email',
            'password.required' => 'un password doit etre fournie',
            // 'image.image' => 'cette image ne respecte pas les formats jpeg, png, jpg, gif'
        ];
    }
}
