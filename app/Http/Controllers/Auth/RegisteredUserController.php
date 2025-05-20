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
use Spatie\Permission\Models\Role;

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
        'name' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'], // Validation for city
        'age' => ['required', 'integer', 'min:1'], // Validation for age
        'whatsapp' => ['required', 'string', 'max:15'], // Validation for WhatsApp number
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'referral_code' => 'nullable|string|exists:users,referral_code',
    ]);

        $referrer = null;

    if ($request->referral_code) {
        $referrer = User::where('referral_code', $request->referral_code)->first();
    }

    $user = User::create([
        'name' => $request->name,
        'city' => $request->city,
        'age' => $request->age,
        'whatsapp' => $request->whatsapp,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'referred_by' => $referrer?->id,
        'has_discount' => $referrer ? true : false,
    ]);

    // ✅ SET ROLE DEFAULT SEBAGAI SISWA
    $user->assignRole('siswa');

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}
}
