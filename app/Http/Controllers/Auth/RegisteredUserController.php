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
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Debug the incoming request to verify all fields are being sent
    // dd($request->all());

    $validatedData = $request->validate([
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'date_of_birth' => 'nullable|date',
        'phone_number' => 'nullable|string|max:15',
        'email' => 'required|string|email|max:255|unique:users',
        'address' => 'nullable|string|max:255',
        'postcode' => 'nullable|string|max:10',
        'city' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
    ]);

    // Ensure all fields are being set, including nullables
    $user = User::create([
        'first_name' => $validatedData['first_name'] ?? null,
        'last_name' => $validatedData['last_name'] ?? null,
        'date_of_birth' => $validatedData['date_of_birth'] ?? null,
        'phone_number' => $validatedData['phone_number'] ?? null,
        'email' => $validatedData['email'], // Required field
        'address' => $validatedData['address'] ?? null,
        'postcode' => $validatedData['postcode'] ?? null,
        'city' => $validatedData['city'] ?? null,
        'country' => $validatedData['country'] ?? null,
        'password' => Hash::make($validatedData['password']),
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}

}
