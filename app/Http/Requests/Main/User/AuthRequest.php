<?php

namespace App\Http\Requests\Main\User;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|string|email|exists:users',
            'password' => 'required|string|password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Это поле необходимо для заполнения',
            'email.string' => 'Данные должны соответствовать строчному типу',
            'email.exists' => 'Вы ввели неверный email',
            'email.email' => 'Email введён некорректно',
            'password.required' => 'Это поле необходимо для заполнения',
            'password.string' => 'Данные должны соответствовать строчному типу',
            'password.password' => 'Вы ввели неверный пароль',
        ];
    }
}
