<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = ['title'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_in_categories');
    }
}
