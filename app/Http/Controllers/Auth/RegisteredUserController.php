<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Http\Requests\ProfileUpdateRequest;

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
    public function store(ProfileUpdateRequest $request): RedirectResponse
    {
        /* $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['alpha'],
            'firstName' => ['required', 'alpha'],
            'lastName' => ['required', 'alpha'],
            'address' => ['required', 'alpha'],
            'phoneNumber' => ['required', 'alpha'],
        ]); */

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "Customer",
            'fname' => isset($request->firstName) ? $request->firstName : "",
            'lname' => isset($request->lastName) ? $request->lastName : "",
            'phone' => isset($request->phoneNumber) ? $request->phoneNumber : "",
            'address' => isset($request->address) ? $request->address : "",
            'budget' => 0.00,
            'visited' => 0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
