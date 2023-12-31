<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'transaction_amount', 'transaction_date', 'transaction_type', 'transaction_teller_name', 'transaction_time'
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
