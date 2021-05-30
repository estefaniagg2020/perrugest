<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerHairdressing
 * 
 * @property int $id
 * @property int $customer_id
 * @property int $hairdressing_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Customer $customer
 * @property Hairdressing $hairdressing
 *
 * @package App\Models
 */
class CustomerHairdressing extends Model
{
	protected $table = 'customer_hairdressing';

	protected $casts = [
		'customer_id' => 'int',
		'hairdressing_id' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'hairdressing_id'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function hairdressing()
	{
		return $this->belongsTo(Hairdressing::class);
	}
}
