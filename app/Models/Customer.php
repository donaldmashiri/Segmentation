<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 'customer_age', 'customer_gender', 'customer_income',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
