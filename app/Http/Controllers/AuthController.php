<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('pages.auth.auth');
    }

    public function auth(Request $request)
    {
        
        // Validation des champs
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        // Tentative d'authentification
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Vérification si l'utilisateur est authentifié avant d'accéder à ses informations
            $user = Auth::user(); 

            if ($user) {
                switch ($user->profil) {
                    case 'SUPER_ADMIN':
                        return redirect()->route('home');
                    case 'GERANT':
                        return redirect()->route('home');
                    default:
                        return redirect()->route('home');
                }
            }
        }

        return back()->with('error', "Email et/ou Mot de passe incorrect");
    }
}
