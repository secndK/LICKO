<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AgentPanne
 * 
 * @property int $code_panne
 * @property string $matricule
 * 
 * @property Panne $panne
 * @property Agent $agent
 *
 * @package App\Models
 */
class AgentPanne extends Model
{
	protected $table = 'agent_panne';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_panne' => 'int'
	];

	public function panne()
	{
		return $this->belongsTo(Panne::class, 'code_panne');
	}

	public function agent()
	{
		return $this->belongsTo(Agent::class, 'matricule');
	}
}
