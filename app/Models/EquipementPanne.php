<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EquipementPanne
 * 
 * @property string $num_serie
 * @property int $code_panne
 * 
 * @property Equipement $equipement
 * @property Panne $panne
 *
 * @package App\Models
 */
class EquipementPanne extends Model
{
	protected $table = 'equipement_panne';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_panne' => 'int'
	];

	public function equipement()
	{
		return $this->belongsTo(Equipement::class, 'num_serie');
	}

	public function panne()
	{
		return $this->belongsTo(Panne::class, 'code_panne');
	}
}
