<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLog;

class UserLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:show-user-log', ['only' => ['index','show']]);
    }

    public function index()
    {
        $userLogs = UserLog::paginate(10); // Retrieve all UserLog entries
        return view('modules.user_logs.index', compact('userLogs'));
    }
}
