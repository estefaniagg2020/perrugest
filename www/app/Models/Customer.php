<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $telf
 * @property string|null $name_pet
 * @property string|null $hair_pet
 * @property string|null $breed_pet
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Hairdressing[] $hairdressings
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';

	protected $fillable = [
		'name',
		'email',
		'telf',
		'name_pet',
		'hair_pet',
		'breed_pet'
	];

	public function hairdressings()
	{
		return $this->belongsToMany(Hairdressing::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
	
}
