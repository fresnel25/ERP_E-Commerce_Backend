<?php

namespace App\Http\Requests\CategoryPost;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCategoryPostRequest extends FormRequest
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
            'Name' => 'required|unique:categories,Name',
            'Description' => 'required'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => 'false',
            'error' => 'true',
            'message' => 'erreur de validation',
            'errorsList' => $validator->errors()
        ]));
    }

    public function messages(){
        return[
            'Name.required' => 'un nom de categorie doit etre fourni',
            'Name.unique' => 'cette categorie existe deja',
            'Description.required' => 'une description de la categorie doit etre fournie',
        ];
    }
}
