<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HairdressingUser
 * 
 * @property int $id
 * @property int $user_id
 * @property int $hairdressing_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Hairdressing $hairdressing
 * @property User $user
 *
 * @package App\Models
 */
class HairdressingUser extends Model
{
	protected $table = 'hairdressing_user';

	protected $casts = [
		'user_id' => 'int',
		'hairdressing_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'hairdressing_id'
	];

	public function hairdressing()
	{
		return $this->belongsTo(Hairdressing::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
