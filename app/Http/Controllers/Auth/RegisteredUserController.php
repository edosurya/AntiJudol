<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Spatie\Newsletter\Facades\Newsletter;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $name = explode(' ', $user->name);
            if (config('services.mailchimp.is_active')) Newsletter::subscribe($user->email, ['FNAME' => $name[0], 'LNAME' => $name[1] ?? '']);

            event(new Registered($user));

            Auth::login($user);

            if (!$request->expectsJson())
                return redirect(route('admin.dashboard', absolute: false));

            return response()->json(['success' => true, 'message' => "Register success!", 'redirect' => route('admin.dashboard')]);
        } catch (\Throwable $th) {
            if (!$request->expectsJson())
                return redirect(route('register'))->with('message', 'Server error');

            return response()->json(['success' => false, 'message' => "Server error!", 'redirect' => route('register')]);
        }
    }
}
