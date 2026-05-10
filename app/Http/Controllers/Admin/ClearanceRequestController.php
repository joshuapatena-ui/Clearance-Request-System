<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClearanceRequestController extends Controller
{
    public function index()
    {
        $requests = \App\Models\ClearanceRequest::with(['user', 'department'])->latest()->get();
        return view('admin.requests.index', compact('requests'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:cleared,rejected',
            'remarks' => 'nullable|string'
        ]);

        $clearanceRequest = \App\Models\ClearanceRequest::findOrFail($id);
        $clearanceRequest->update([
            'status' => $request->status,
            'remarks' => $request->remarks
        ]);

        return redirect()->back()->with('success', 'Clearance status updated for ' . $clearanceRequest->user->name);
    }

}
