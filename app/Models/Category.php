<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    // Kolom-kolom yang diizinkan untuk mass assignment
    protected $fillable = ['name', 'image', 'description', 'excellence'];
}
