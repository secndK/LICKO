<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Panne
 * 
 * @property int $code_panne
 * @property string|null $type_panne
 * @property string|null $libelle_panne
 * 
 * @property Collection|Agent[] $agents
 * @property Collection|Equipement[] $equipements
 *
 * @package App\Models
 */
class Panne extends Model
{
	protected $table = 'panne';
	protected $primaryKey = 'code_panne';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_panne' => 'int'
	];

	protected $fillable = [
		'type_panne',
		'libelle_panne'
	];

	public function agents()
	{
		return $this->belongsToMany(Agent::class, 'agent_panne', 'code_panne', 'matricule');
	}

	public function equipements()
	{
		return $this->belongsToMany(Equipement::class, 'equipement_panne', 'code_panne', 'num_serie');
	}
}
