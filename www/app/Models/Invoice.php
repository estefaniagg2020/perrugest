<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property string $number
 * @property int $order_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Order $order
 * @property Collection|InvoiceLine[] $invoice_lines
 *
 * @package App\Models
 */
class Invoice extends Model
{
	protected $table = 'invoices';

	protected $casts = [
		'order_id' => 'int'
	];

	protected $fillable = [
		'number',
		'order_id'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function invoice_lines()
	{
		return $this->hasMany(InvoiceLine::class);
	}
}
