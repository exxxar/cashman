<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAdvertising extends Model
{
    use HasFactory;

    protected $table = 'company_advertising';
    protected $fillable = ['title', 'description', 'company_id',
        'regularity', 'properties', 'creator_id', 'is_active', 'images', 'type'];
    protected $casts = [
        'properties' => 'array',
        'images' => 'array'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
