<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Composant
 * 
 * @property int $code_composant
 * @property string|null $designation_composant
 * @property string|null $nom_composant
 * @property string|null $num_serie
 * 
 * @property Equipement|null $equipement
 *
 * @package App\Models
 */
class Composant extends Model
{
	protected $table = 'composant';
	protected $primaryKey = 'code_composant';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_composant' => 'int'
	];

	protected $fillable = [
		'designation_composant',
		'nom_composant',
		'num_serie'
	];

	public function equipement()
	{
		return $this->belongsTo(Equipement::class, 'num_serie');
	}
}
