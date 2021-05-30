<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InvoiceLine
 * 
 * @property int $id
 * @property string $name
 * @property float $quantity
 * @property float $price
 * @property float $vat
 * @property float $total
 * @property int $product_id
 * @property int $invoice_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Invoice $invoice
 * @property Product $product
 *
 * @package App\Models
 */
class InvoiceLine extends Model
{
	protected $table = 'invoice_lines';

	protected $casts = [
		'quantity' => 'float',
		'price' => 'float',
		'vat' => 'float',
		'total' => 'float',
		'product_id' => 'int',
		'invoice_id' => 'int'
	];

	protected $fillable = [
		'name',
		'quantity',
		'price',
		'vat',
		'total',
		'product_id',
		'invoice_id'
	];

	public function invoice()
	{
		return $this->belongsTo(Invoice::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
