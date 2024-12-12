<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;

class DashboardController extends Controller
{
    public function index(){
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Passer l'utilisateur à la vue
        return view('auth.dashboard', compact('user'));


    }
}
