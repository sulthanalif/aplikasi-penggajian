<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'total_salary',
        'receipt_or_donation',
        'savings',
        'cooperative',
        'bank',
        'total_payroll',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
