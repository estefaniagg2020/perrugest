<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $id
 * @property string $name
 * @property float $total
 * @property int $customer_id
 * @property int $hairdressing_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Customer $customer
 * @property Hairdressing $hairdressing
 * @property Collection|Invoice[] $invoices
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';

	protected $casts = [
		'total' => 'float',
		'customer_id' => 'int',
		'hairdressing_id' => 'int'
	];

	protected $fillable = [
		'name',
		'total',
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

	public function invoices()
	{
		return $this->hasMany(Invoice::class);
	}

	public function products()
	{
		return $this->hasMany(Product::class);
	}
}
