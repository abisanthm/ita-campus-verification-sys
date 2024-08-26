<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'nic_no',
        'contact_no',
        'address',
        'register_no',
        'certificate_no',
        'course_name',
        'course_enrollment_date',
        'course_completion_date',
        'duration',
        'status',
        'award_date',
        'profile_image_path',
    ];

    protected $casts = [
        'course_enrollment_date' => 'datetime',
        'course_completion_date' => 'datetime',
        'award_date' => 'datetime',
    ];
}
