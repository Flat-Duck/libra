<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaperUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', 'string'],
            'publisher' => ['required', 'max:255', 'string'],
            'published_at' => ['required', 'date'],
            'department_id' => ['required', 'exists:departments,id'],
        ];
    }
}
