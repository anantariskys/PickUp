<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'makanan_id', 'kuantiti'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }
    use HasFactory;
    
}
