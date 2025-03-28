<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
    public function rules(): array {
        return [
            "name" => "required|string",
            "email" => "required|string|email|unique:users",
            "role" => "required|integer",
        ];
    }

    public function messages(): array {
        return [
            "name.required" => "Имя обязательно для заполнения",
            "name.string" => "Имя должно быть строкой",

            "email.required" => "Email обязателен для заполнения",
            "email.string" => "Email должен быть строкой",
            "email.email" => "Введите корректный адрес электронной почты",
            "email.unique" => "Этот Email уже зарегистрирован",

            "role.required" => "Роль обязательно надо определить",
        ];
    }

}
