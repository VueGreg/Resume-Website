<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class EmailRequest extends FormRequest
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'mail' => 'required|regex:/^.+@.+$/i',
            'message' => 'required',
            'confirm' => 'accepted',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est requis.',
            'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
            'surname.required' => 'Le prénom est requis.',
            'surname.max' => 'Le prénom ne doit pas dépasser 255 caractères.',
            'mail.required' => 'L\'adresse e-mail est requise.',
            'mail.regex' => 'Le format de l\'adresse e-mail est invalide.',
            'message.required' => 'Le message est requis.',
            'confirm.accepted' => 'Les mentions légales doivent être acceptées',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new \Illuminate\Validation\ValidationException($validator))->errors();

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Il y a des erreurs de validation',
            'errors' => $errors,
        ], 422));
    }
}
