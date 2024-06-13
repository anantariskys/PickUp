<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'deskripsi', 'harga', 'gambar'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
