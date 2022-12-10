<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'users_id',
        'address',
        'total_price',
        'shipping_price',
        'status'
    ];

    // bikin relasi table
    // belongsTo -> singular
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    // hasMany -> plural
    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transactions_id', 'id');
    }
}
