<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory;
    protected $table = 'tariffs';
    protected $fillable = ['money_per_day', 'title', 'description',
           'is_visible', 'properties', 'creator_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function finances()
    {
        return $this->HasMany(FinanceAndTariff::class);
    }
}
