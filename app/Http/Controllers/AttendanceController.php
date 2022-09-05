<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Excel;
class AttendanceController extends Controller
{
    //
    public function postFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        
        $file = file($request->file->getRealPath());
        $data = array_slice($file, 1);

        $parts = (array_chunk($data, 5000));

        foreach($parts as $index=>$part){
            $filename = resource_path('pending-files/'.date('y-m-d-H-i-s').$index.'.csv');

            file_put_contents($filename, $part);
        }

        session()->flash('status', 'queued for importing');

        $path = resource_path('pending-files/*.csv');

        $g = glob($path);

        foreach (array_slice($g, 0, 1) as $file){

            $data = array_map('str_getcsv', file($file));
            // dd($data);
            foreach ($data as $row) {
                Attendance::create([
                    'emp_id' => $row[0],
                    'check_in' => $row[1],
                    'check_out' => $row[2],
                    'schedule_id' => $row[3],
                ]);
            }

            unlink($file);
        }

        return response()->json([
            'message' => "data imported"
        ]);
        
    }
}
