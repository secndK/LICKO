<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AgentRole
 * 
 * @property int $code_role
 * @property string $matricule
 * 
 * @property Role $role
 * @property Agent $agent
 *
 * @package App\Models
 */
class AgentRole extends Model
{
	protected $table = 'agent_role';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_role' => 'int'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'code_role');
	}

	public function agent()
	{
		return $this->belongsTo(Agent::class, 'matricule');
	}
}
