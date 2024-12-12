<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $code_role
 * @property string $libelle_role
 * 
 * @property Collection|Agent[] $agents
 * @property Collection|Permission[] $permissions
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'role';
	protected $primaryKey = 'code_role';
	public $timestamps = false;

	protected $fillable = [
		'libelle_role'
	];

	public function agents()
	{
		return $this->belongsToMany(Agent::class, 'agent_role', 'code_role', 'matricule');
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'role_permission', 'code_role', 'code_permission');
	}
}
