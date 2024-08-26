<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    /**
     * Retrieve paginated list of students.
     *
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getStudentsData($perPage = 5)
    {
        return Student::select(
                'id',
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
            )
            ->paginate($perPage);
    }

    /**
     * Retrieve a single student by ID.
     *
     * @param int $id
     * @return \App\Models\Student|null
     */
    public function getStudentByID($id)
    {
        return Student::select(
                'id',
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
            )
            ->where('id', $id)
            ->first();
    }
}
