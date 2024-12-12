<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $code_permission
 * @property string $Libelle_permission
 * 
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permission';
	protected $primaryKey = 'code_permission';
	public $timestamps = false;

	protected $fillable = [
		'Libelle_permission'
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'role_permission', 'code_permission', 'code_role');
	}
}
