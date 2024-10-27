<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi melalui mass assignment
    protected $fillable = ['name', 'description', 'price', 'category_id', 'whatsapp_id', 'image'];

    // Relasi ke kategori (many-to-one)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // Product.php
    public function whatsapp()
    {
        return $this->belongsTo(Whatsapp::class, 'whatsapp_id');
    }

}
