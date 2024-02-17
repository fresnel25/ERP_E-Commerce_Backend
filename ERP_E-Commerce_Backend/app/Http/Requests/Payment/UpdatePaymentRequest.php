<?php

namespace App\Http\Requests\Payment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePaymentRequest extends FormRequest
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
            'Name' => 'requred',
            'Amount' => 'required',
        ];
    }

    public function failedValidation(Validator $validator)
    {
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
            'Name.required' => 'Un nom doit etre fourni',
            'Amount.required' => 'un montant  doit etre fournie',
             
        ];
    }
}
