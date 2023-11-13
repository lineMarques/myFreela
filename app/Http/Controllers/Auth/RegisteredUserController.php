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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'userName' => ['required', 'string', 'max:255'],
            'typeUser' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:11'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'userName' => $request->userName,
            'typeUser' => $request->typeUser,
            'contact' => $request->contact,

            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $user->rating()->create([
            'evaluator_user_id' => $user->id,
            'star' => 5,
            'reviwe' => 'My First Star',
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->typeUser === 'gerente') {
            return redirect(RouteServiceProvider::COMPANY);
        } else {
            return redirect(RouteServiceProvider::CURRICULO);
        }
    }
}
