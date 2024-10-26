<?php

namespace App\Http\Requests;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class CaminhaoRequest extends FormRequest
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
            'placa' => ['required', 'string', 'max:8', 'unique:caminhoes,placa'],
            'modelo_id' => ['required', 'integer', 'exists:modelos,id'],
        ];
    }

    public function update()
    {
        return [
            'modelo_id' => ['nullable', 'integer', 'exists:modelos,id'],
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
            'placa' => 'Placa',
        ];
    }
}
