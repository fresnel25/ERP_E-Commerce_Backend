<?php

namespace App\Http\Requests\Post;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePostRequest extends FormRequest
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
            'Title' => 'required',
            'Price' => 'required',
            'Profil' => 'required',
            'QuantityInit' => 'required',
            'QuantityStock' => 'required',
            'TotalQuantityStock' => 'required',

        ];
    }

    // Personnalisation des erreurs
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => 'false',
            'error' => 'true',
            'message' => 'erreur de validation',
            'errorsList' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return[
            'Title.required' => 'Un titre doit etre fourni',
            'Price.required' => 'Un prix doit etre fourni',
            'Profil.required' => 'Un profil doit etre fourni',
            'QuantityInit.required' => 'la quantite a entrer en stock doit etre fournie',
            'QuantityStock.required' => 'la quantite en stock doit etre fournie',
            'TotalQuantityStock.required' => 'la quantite totale en stock doit etre fournie',
        ];
    }
}
