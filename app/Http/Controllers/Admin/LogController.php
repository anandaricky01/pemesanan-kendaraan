<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('superadmin');
    // }

    public function index(){
        $logs = Log::latest()->paginate(10)->withQueryString();
        return view('dashboard.logs.index', [
            'logs' => $logs
        ]);
    }

    public function create_log($user, $device, String $status, String $activity){
        return Log::create(['device' => $device, 'user' => $user, 'status' => $status, 'activity' => $activity]);
    }
}
