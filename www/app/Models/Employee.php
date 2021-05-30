<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string $name
 * @property string $last_name
 * @property string $rol
 * @property string $email
 * @property int $hairdressing_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Hairdressing $hairdressing
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';

	protected $casts = [
		'hairdressing_id' => 'int'
	];

	protected $fillable = [
		'name',
		'last_name',
		'rol',
		'email',
		'hairdressing_id'
	];

	public function hairdressing()
	{
		return $this->belongsTo(Hairdressing::class);
	}
}
