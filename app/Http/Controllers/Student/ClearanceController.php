<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClearanceController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $departments = \App\Models\Department::all();
        $requests = $user->clearanceRequests()->with('department')->get();
        
        $overallStatus = 'Incomplete';
        if ($requests->count() > 0 && $requests->count() === $departments->count()) {
            $allCleared = $requests->every(function($req) {
                return $req->status === 'cleared';
            });
            if ($allCleared) $overallStatus = 'Fully Cleared';
        }

        return view('dashboard', compact('departments', 'requests', 'overallStatus'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $departments = \App\Models\Department::all();

        foreach ($departments as $dept) {
            // Check if request already exists
            $exists = \App\Models\ClearanceRequest::where('user_id', $user->id)
                        ->where('department_id', $dept->id)
                        ->exists();

            if (!$exists) {
                \App\Models\ClearanceRequest::create([
                    'user_id' => $user->id,
                    'department_id' => $dept->id,
                    'status' => 'pending'
                ]);
            }
        }

        return redirect()->back()->with('success', 'Clearance request submitted to all departments.');
    }

}
