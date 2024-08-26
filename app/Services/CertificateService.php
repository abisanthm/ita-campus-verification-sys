<?php

namespace App\Services;

use App\Models\Student;

class CertificateService
{
    public function getCertificateData($searchId)
    {
        $data = Student::where('certificate_no', $searchId)
        ->orWhere('register_no', $searchId)
        ->first();

    return $data;

    }
}
