<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use App\Models\Student;
use App\Services\StudentService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $std_sum = Student::count();
        $user_sum = User::count();
        $req_sum = Setting::value('requests');

        $studentService = new StudentService();
        $students = $studentService->getStudentsData(5);

        return view('dashboard',[ 'students' => $students ],compact('std_sum', 'user_sum','req_sum'));
    }

    public function nav()
    {
        $setting = Setting::findOrFail(1);
        return view('layouts.nav',compact('setting'));
    }

}
