<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobVacancyRequest extends FormRequest
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
            'employer_id' => 'required|exists:employers,id',
            'job_title' => 'required|string|max:255',
            'job_description' => 'required|string',
            'requirements' => 'nullable|string|max:255',
            'location' => 'required|string|max:255',
        ];
    }
}
