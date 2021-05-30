<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $ref
 * @property string $name
 * @property int $stock
 * @property string $service
 * @property float $price
 * @property Carbon $time
 * @property int $hairdressing_id
 * @property int $order_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Hairdressing $hairdressing
 * @property Order $order
 * @property Collection|InvoiceLine[] $invoice_lines
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'stock' => 'int',
		'price' => 'float',
		'hairdressing_id' => 'int',
		'order_id' => 'int'
	];

	protected $dates = [
		'time'
	];

	protected $fillable = [
		'ref',
		'name',
		'stock',
		'service',
		'price',
		'time',
		'hairdressing_id',
		'order_id'
	];

	public function hairdressing()
	{
		return $this->belongsTo(Hairdressing::class);
	}

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function invoice_lines()
	{
		return $this->hasMany(InvoiceLine::class);
	}
}
