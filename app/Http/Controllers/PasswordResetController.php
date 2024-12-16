<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordReset;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    // Afficher le formulaire pour soumettre un email
    public function showEmailForm()
    {
        return view('auth.password-reset'); // Vue du formulaire d'email
    }

    // Traiter la soumission de l'email
    public function sendResetCode(Request $request)
    {
        // Validation simple de l'email (pas besoin d'existence dans la base de données)
        $request->validate([
            'email' => 'required|email',
        ]);

        // Générer un code de réinitialisation unique
        $resetCode = Str::random(6); // Exemple : code alphanumérique de 6 caractères

        // Stocker le code dans la table password_resets
        PasswordReset::updateOrCreate(
            ['email' => $request->email], // Critère : l'email soumis
            [
                'token' => $resetCode, // Le code généré
                'created_at' => now(), // Timestamp
            ]
        );

        // Envoyer le code par email
        Mail::send('auth.password-reset', ['code' => $resetCode], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Votre code de réinitialisation de mot de passe');
        });

        return back()->with('success', 'Un code a été envoyé à votre email.');
    }

    // Afficher le formulaire pour soumettre le code
    public function showVerifyForm()
    {
        return view('auth.verify-code'); // Vue pour entrer le code
    }

    // Vérifier le code soumis
    public function verifyCode(Request $request)
    {
        // Validation du formulaire
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
        ]);

        // Vérifier si le code existe et est valide
        $resetRequest = PasswordReset::where('email', $request->email)
                                     ->where('token', $request->code)
                                     ->first();

        // Vérifier si le code a expiré
        if (!$resetRequest || $resetRequest->created_at < Carbon::now()->subMinutes(15)) {
            return back()->withErrors(['code' => 'Code invalide ou expiré.']);
        }

        // Si tout est valide, rediriger vers une page de succès ou de création de compte
        return redirect()->route('password.success')->with('success', 'Code validé. Procédez à la réinitialisation.');
    }
}
