<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:todo,doing,done',
            'priority' => 'integer|min:1|max:5',
            'due_date' => 'nullable|date|after_or_equal:2000-01-01',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id',
        ];
    }
}
