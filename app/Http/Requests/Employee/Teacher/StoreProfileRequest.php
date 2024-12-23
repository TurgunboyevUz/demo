<?php

namespace App\Http\Requests\Employee\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'faculty_id' => 'required|exists:faculties,id',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ];
    }
}
