<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CertificateService;
use App\Http\Requests\VerifyRequest;
use App\Models\Setting;
use App\Models\UserLog;
use Illuminate\Support\Facades\Cache;


class VerifyController extends Controller
{
        protected $certificateService;

        public function __construct(CertificateService $certificateService)
        {
            $this->certificateService = $certificateService;
        }


    public function index()
    {
        return view('modules.verify.index');
    }


    public function verifyCertificate(VerifyRequest $request)
    {
        $validatedData = $request->validated();

        $searchId = $request->input('search_id');
        $student = $this->certificateService->getCertificateData($searchId);

        if (!$student) {
            // If student not found, return the 'invalid' view
            return view('modules.verify.invalid');
        }

        $setting = Setting::firstOrNew([]); // Assuming you have only one row for settings
        $setting->requests = $setting->requests + 1;
        $setting->save();

        $userLog = new UserLog();
        $userLog->ip_address = $request->ip();
        $userLog->std_id = $student->student_id;
        $userLog->user_agent = $request->header('User-Agent');
        $userLog->save();


        return view('modules.verify.show', compact('student','searchId'));
    }
}
