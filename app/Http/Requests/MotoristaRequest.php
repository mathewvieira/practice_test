<?php

namespace App\Http\Requests;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class MotoristaRequest extends FormRequest
{
    use ApiResponseTrait;

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
        return match ($this->method()) {
            'POST' => $this->store(),
            'PUT', 'PATCH' => $this->update()
        };
    }

    public function store()
    {
        return [
            'nome' => ['required', 'string', 'max:100'],
            'cpf' => ['required', 'digits:11', 'unique:motoristas,cpf'],
            'data_nascimento' => ['required', 'date_format:d/m/Y', 'before:-18 years'],
            'email' => ['nullable', 'string', 'max:100'],

            'transportadora_ids' => ['array'],
            'transportadora_ids.*' => ['exists:transportadoras,id']
        ];
    }

    public function update()
    {
        return [
            'nome' => ['nullable', 'string', 'max:100'],
            'data_nascimento' => ['nullable', 'date_format:d/m/Y', 'before:-18 years'],
            'email' => ['nullable', 'string', 'max:100'],

            'transportadora_ids' => ['array'],
            'transportadora_ids.*' => ['exists:transportadoras,id']
        ];
    }

    public function validated($key = null, $default = null): array
    {
        $validatedData = parent::validated($key, $default);

        return array_map('trim', $validatedData);
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->errorResponse(
            'Bad request',
            Response::HTTP_BAD_REQUEST,
            $validator->errors()
        ));
    }

    public function attributes()
    {
        return [
            'nome' => 'Nome',
            'cpf' => 'CPF',
            'data_nascimento' => 'Data de Nascimento',
            'email' => 'E-mail'
        ];
    }
}
