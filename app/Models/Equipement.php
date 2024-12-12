<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipement
 * 
 * @property string $num_serie
 * @property string|null $designation_equipement
 * @property string|null $nom_equipement
 * @property string|null $type_equipement
 * @property string|null $etat_equipement
 * @property Carbon|null $date_acq
 * @property string|null $site
 * @property string|null $matricule
 * 
 * @property Agent|null $agent
 * @property Collection|Composant[] $composants
 * @property Collection|Panne[] $pannes
 *
 * @package App\Models
 */
class Equipement extends Model
{
	protected $table = 'equipement';
	protected $primaryKey = 'num_serie';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'date_acq' => 'datetime'
	];

	protected $fillable = [
		'designation_equipement',
		'nom_equipement',
		'type_equipement',
		'etat_equipement',
		'date_acq',
		'site',
		'matricule'
	];

	public function agent()
	{
		return $this->belongsTo(Agent::class, 'matricule');
	}

	public function composants()
	{
		return $this->hasMany(Composant::class, 'num_serie');
	}

	public function pannes()
	{
		return $this->belongsToMany(Panne::class, 'equipement_panne', 'num_serie', 'code_panne');
	}
}
