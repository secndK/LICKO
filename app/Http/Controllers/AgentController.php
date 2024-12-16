<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Afficher la liste des agents.
     */
    public function index()
    {
        $agents = Agent::all();
        return view('agents.index', compact('agents'));
    }

    /**
     * Afficher le formulaire de création d'un agent.
     */
    public function create()
    {
        return view('agents.create');
    }

    /**
     * Enregistrer un nouvel agent dans la base de données.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'matricule' => 'required|string|max:255|unique:agent,matricule',
            'nom_prenom' => 'required|string|max:255',
            'mot_de_passe' => 'required|string|min:8',
            'localisation_agent' => 'required|string|max:255',
            'code_role' => 'required|integer',
        ]);

        Agent::create($validatedData);

        return redirect()->route('agents.index')->with('success', 'Agent ajouté avec succès.');
    }

    /**
     * Afficher les détails d'un agent spécifique.
     */
    public function show($matricule)
    {
        $agent = Agent::findOrFail($matricule);
        return view('agents.show', compact('agent'));
    }

    /**
     * Afficher le formulaire d'édition d'un agent.
     */
    public function edit($matricule)
    {
        $agent = Agent::findOrFail($matricule);
        return view('agents.edit', compact('agent'));
    }

    /**
     * Mettre à jour les informations d'un agent dans la base de données.
     */
    public function update(Request $request, $matricule)
    {
        $agent = Agent::findOrFail($matricule);

        $validatedData = $request->validate([
            'nom_prenom' => 'required|string|max:255',
            'mot_de_passe' => 'required|string|min:8',
            'localisation_agent' => 'required|string|max:255',
            'code_role' => 'required|integer',
        ]);

        $agent->update($validatedData);

        return redirect()->route('agents.index')->with('success', 'Agent mis à jour avec succès.');
    }

    /**
     * Supprimer un agent de la base de données.
     */
    public function destroy($matricule)
    {
        $agent = Agent::findOrFail($matricule);
        $agent->delete();

        return redirect()->route('agents.index')->with('success', 'Agent supprimé avec succès.');
    }
}
