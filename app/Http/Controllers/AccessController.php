<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccessController extends Controller
{
    public function requestAccess(Request $request)
    {
        $request->validate([
            'uid' => 'required',
            'request_type' => 'required',
            'device_type' => 'required'
        ]);

        if ($request->request_type !== 'access_request') {
            return response()->json([
                'message' => 'Unknown request type.',
            ]);
        }

        $token = $request->uid;

        $user = User::where('token', $token)->first();

        if ($user === null) {
            return response()->json([
                'message' => 'User not found.',
            ]);
        }

        if ($user->access == 1) {
            return response()->json([
                'uid' => $token,
                'access_granted' => true,
                'device_type' => $request->device_type,
                'message' => 'Access granted.'
            ]);
        }

        if ($user->access == 0) {
            return response()->json([
                'uid' => $token,
                'access_granted' => false,
                'device_type' => $request->device_type,
                'message' => 'Access denied.'
            ]);
        }
    }
}
