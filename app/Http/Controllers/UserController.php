<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;

class UserController extends Controller
{
    public function create(Request $request)
    {
        //Si l'utilisateur est déjà conecté
        if (Auth::guard('user')->check()) {
            return redirect()->route('cart.summary');
        }

        //Sinon on crée un compte
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:8|confirmed',
            'zip_code'   => 'required|integer|min:01000|max:99999',
            'city'       => 'required|string',
            'address'    => 'required|string'
        ], [
            'email.email' => 'L\'email doit être valide',
            'email.unique' => 'L\'email existe déjà',
            'password.min' => 'Le mot de passe doit faire 8 caractères minimum',
            'password.confirmed' => 'Mots de passe différents',
            'zip_code.min' => 'Format de code postal invalide',
            'zip_code.max' => 'Format de code postal invalide'
        ]);

        $addressData = [
            'zip_code' => $validated['zip_code'],
            'city'     => $validated['city'],
            'address'  => $validated['address'],
        ];

        unset($validated['zip_code'], $validated['city'], $validated['address']);

        $user = User::create($validated);

        $user->adress()->create($addressData);

        $oldCart = session()->get('cart');

        Auth::guard('user')->login($user);

        session()->put('cart', $oldCart);

        return redirect()->route('cart.summary');
        // redirect()->route('cart.confirm');
        // redirect()->back()->with('success', 'Client enregistré avec succès.');
        //view ('/basket/confirm', ['user' => $user]);

    }

}
