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
            'name' => ['required', 'string','min:3', 'max:255'],
            'surname' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'telephone' => ['nullable','size:10'],
        ],
        [
            'name.required' => 'Il nome è un campo richiesto.',
            'name.max' => 'Il nome può avere un massimo di :max caratteri.',
            'name.min' => 'Il nome deve avere un minimo di :min caratteri.',
            'surname.required' => 'Il cognome è un campo richiesto.',
            'surname.min' => 'Il cognome deve avere un minimo di :min caratteri.',
            'surname.max' => 'Il cognome può avere un massimo di :max caratteri.',
            'email.required' => 'L\'email è un campo richiesto.',
            'email.email' => 'L\'email deve essere valida.',
            'email.max' => 'L\'email può avere un massimo di :max caratteri.',
            'email.unique' => 'L\'email è già utilizzata.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
