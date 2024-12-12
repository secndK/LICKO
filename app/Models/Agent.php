<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Assure
use Illuminate\Notifications\Notifiable;

/**
 * Class Agent
 *
 * @property string $matricule
 * @property string|null $nom_prenom
 * @property string|null $mot_de_passe
 * @property string|null $localisation_agent
 * @property int|null $code_role
 *
 * @property Role|null $role
 * @property Collection|Panne[] $pannes
 * @property Collection|Role[] $roles
 * @property Collection|Equipement[] $equipements
 *
 * @package App\Models
 */
class Agent extends Authenticatable
{
	use Notifiable;
    protected $table = 'agent';
    protected $primaryKey = 'matricule'; // Clé primaire personnalisée
    public $incrementing = false; // Si la clé n'est pas un entier auto-incrémenté
    protected $keyType = 'string';






	protected $fillable = [
        'matricule',
        'nom_prenom',
		'mot_de_passe',
		'localisation_agent',
		'code_role'
	];

    protected $hidden = [
        'mot_de_passe', // Cache le mot de passe lors de la sérialisation
    ];

    public function getAuthPassword()
    {
        return $this->mot_de_passe; // Si votre colonne de mot de passe est nommée différemment
    }

	public function role()
	{
		return $this->belongsTo(Role::class, 'code_role');
	}

	public function pannes()
	{
		return $this->belongsToMany(Panne::class, 'agent_panne', 'matricule', 'code_panne');
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'agent_role', 'matricule', 'code_role');
	}

	public function equipements()
	{
		return $this->hasMany(Equipement::class, 'matricule');
	}
}
