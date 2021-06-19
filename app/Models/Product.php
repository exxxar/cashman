<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['company_id', 'title', 'description',
           'price', 'discount_price', 'type'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class)->using(ProductsInCategories::class);
    }
}
