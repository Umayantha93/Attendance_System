<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Src\AppHumanResources\Attendance\Application\AttendanceService;

class AttendanceController extends Controller
{
    //
    public function postFile(Request $request)
    {
        
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
    
        if($request)
        {
            $attendance = AttendanceService::postAttendance($request);
        }

        return response()->json([
            'message' => "data imported"
        ]);
        
    }

    public function getFile()
    {

        $attendance = AttendanceService::getAttendance();

        return response()->json($attendance);
        
    }
}
