<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Address;

class CustomerController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:customers,email',
            'password'   => 'required|string|min:8|confirmed',
            'zip_code'   => 'required|integer|min:11111|max:99999',
            'city'       => 'required|string',
            'address'    => 'required|string'
        ], [
            'email' => 'L\'email doit être valide',
            'passowrd.min' => 'Le mot de passe doit faire 8 caractères minimum',
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

        $customer = Customer::create($validated);

        $customer->adress()->create($addressData);

        return redirect()->back()->with('success', 'Client enregistré avec succès.');
    }
}
