<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLecturerRequest extends FormRequest
{
    use UserRules;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return array_merge($this->UpdateUserRules(),[
            'bank_account' => 'sometimes|required|string',
            'level' => 'sometimes|required|in:Lecturer,Master Lecturer, Senior Lecturer'
        ]);
    }
}
