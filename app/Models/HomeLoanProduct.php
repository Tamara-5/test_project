<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeLoanProduct extends Model
{
    use HasFactory;

    protected $table = 'home_loan_product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'adviser_id',
        'property_value',
        'down_payment_amount'
    ];
}
