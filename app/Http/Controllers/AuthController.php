<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Agent;

class AuthController extends Controller
{
    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        if (Auth::check()) {
            // L'utilisateur est déjà connecté, redirection vers le dashboard
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }




    public function login(Request $request)
    {
        // Valider les champs du formulaire
        $credentials = $request->validate([
            'matricule' => 'required|string',
            'mot_de_passe' => 'required|string|min:6',
        ]);

        // Rechercher l'agent par matricule
        $agent = Agent::where('matricule', $credentials['matricule'])->first();

        if ($agent) {
            // Si le mot de passe n'est pas encore enregistré, l'enregistrer
            if (empty($agent->mot_de_passe)) {
                $agent->mot_de_passe = Hash::make($credentials['mot_de_passe']);
                $agent->save();
            }

            // Vérifier le mot de passe
            if (Hash::check($credentials['mot_de_passe'], $agent->mot_de_passe)) {
                // Déconnecter tout utilisateur précédemment connecté
                Auth::logout();

                // Authentifier l'agent
                Auth::login($agent);

                // Redirection après connexion réussie
                return redirect()->intended('dashboard');
            } else {
                return back()->with('error', 'Vos identifiants ou votre mot de passe sont incorrects.');
            }
        }

        return back()->with('error', 'OUPSii faite attention à ce que vous écrivez.');
    }

    // Méthode pour déconnecter l'utilisateur
    public function logout(Request $request)
    {
        // Déconnexion de l'utilisateur
        Auth::logout();

        // Invalider la session active
        $request->session()->invalidate();

        // Régénérer le token CSRF pour plus de sécurité
        $request->session()->regenerateToken();

        // Rediriger vers la page de connexion
        return redirect()->route('login');
    }



}

