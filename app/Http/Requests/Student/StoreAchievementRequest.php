<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreAchievementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'criteria_id' => ['required', 'integer', 'exists:criterias,id'],
            'type' => ['required', 'string', 'in:sport,cultural'],
            'participant' => ['required', 'string', 'in:individual,team'],
            'team_members' => ['nullable', 'string'],
            'location' => ['required', 'string', 'in:tashkent,andijan'],
            'document_type' => ['required', 'string', 'in:certificate,diploma'],
            'file' => ['required', 'file', 'mimes:pdf'],
        ];
    }
}
