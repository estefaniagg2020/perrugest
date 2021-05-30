<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hairdressing
 * 
 * @property int $id
 * @property string $name
 * @property string $adress
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Customer[] $customers
 * @property Collection|Employee[] $employees
 * @property Collection|User[] $users
 * @property Collection|Order[] $orders
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Hairdressing extends Model
{
	protected $table = 'hairdressings';

	protected $fillable = [
		'name',
		'adress'
	];

	public function customers()
	{
		return $this->belongsToMany(Customer::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class)
					->withPivot('id')
					->withTimestamps();
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
