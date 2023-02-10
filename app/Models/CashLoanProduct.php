<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashLoanProduct extends Model
{
    use HasFactory;

    protected $table = 'cash_loan_product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'adviser_id',
        'loan_amount'
    ];
}
