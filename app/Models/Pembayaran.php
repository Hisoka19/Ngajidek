<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';
    protected $fillable = [
        'user_id',
        'amount',
        'course_id',
        'refferal_code_id',
        'status',
        'transaction_id'
    ];
}
