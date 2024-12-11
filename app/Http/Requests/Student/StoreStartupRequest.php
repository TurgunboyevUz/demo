<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreStartupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'criteria_id' => 'required|exists:criterias,id',
            'title' => 'required|string|max:255',
            'type' => 'required|in:startup,contest',
            'participant' => 'required|in:individual,team',
            'team_members' => 'nullable|string',
            'location' => 'required|in:tashkent,andijan',
            'file' => 'required|mimes:pdf'
        ];
    }
}
