<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobApplicationRequest extends FormRequest
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
            'job_seeker_id' => 'required|exists:job_seeker_profiles,id',
            'job_vacancy_id' => 'required|exists:job_vacancies,id',
            'status' => 'nullable|in:applied,interviewing,rejected,hired', // Validación para el campo 'status'
        ];
    }
}
