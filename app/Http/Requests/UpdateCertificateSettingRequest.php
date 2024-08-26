<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCertificateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'welcome_message' => 'required|string',
            'footer_title' => 'required|string',
            'footer_message' => 'required|string',
            'invalid_title' => 'required|string',
            'invalid_message' => 'required|string',
            // Add other validation rules as needed
        ];
    }
}
