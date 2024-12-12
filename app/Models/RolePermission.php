<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolePermission
 * 
 * @property int $code_role
 * @property int $code_permission
 * 
 * @property Role $role
 * @property Permission $permission
 *
 * @package App\Models
 */
class RolePermission extends Model
{
	protected $table = 'role_permission';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_role' => 'int',
		'code_permission' => 'int'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'code_role');
	}

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'code_permission');
	}
}
