<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255',
            'nic_no' => 'required|string|max:255',
            'contact_no' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'register_no' => 'required|string|max:255',
            'certificate_no' => 'nullable|string|max:255',
            'course_name' => 'required|string|max:255',
            'course_enrollment_date' => 'nullable|date',
            'course_completion_date' => 'nullable|date',
            'duration' => 'nullable|string|max:100',
            'status' => 'required|in:Following,Complete,Dropped Out',
            'award_date' => 'nullable|date',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
