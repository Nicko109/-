<?php

namespace App\Http\Requests\Main\Task;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'title' => 'nullable|string',
            'filter' => 'in:today,tomorrow,overdue,all',
            'project_id' => 'exists,id',
        ];
    }

    public function messages()
    {
        return [
            'title.string' => 'Данные должны соответствовать строчному типу',
        ];
    }
}
