<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request)
    {
        try {
            if ($request->user()->hasVerifiedEmail()) {
                return redirect()->intended(route('admin.dashboard', absolute: false));
            }

            $request->user()->sendEmailVerificationNotification();

            return response()->json(['success' => true, 'message' => "Verification email sent!"]);
        } catch (\Throwable $th) {

            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }
}
