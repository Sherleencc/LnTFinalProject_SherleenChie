<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id',
        'invoice_number',
        'shipping_address',
        'postal_code',
        'total_price',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
