<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobSeekerProfileRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'age' => 'required|integer|min:18',
            'contact_details' => 'required|string|max:255',
            'education_level' => 'required|string|max:255',
            'grades' => 'nullable|string|max:1000',
            'work_experience' => 'nullable|string|max:1000',
        ];
    }
}
