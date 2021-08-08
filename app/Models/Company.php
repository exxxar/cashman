<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['title', 'domain', 'cashback_percent', 'cashback_percent_level_1',
           'cashback_percent_level_2', 'description',
           'image', 'position', 'company_group_id', 'properties', 'callback_url',
           'socials', 'is_active', 'upload_vk_url', 'creator_id'];
    protected $casts = [
        'socials' => 'array',
        'properties' => 'array',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class)->using(UserCompany::class);
    }

    public function group()
    {
        return $this->belongsTo(GroupCompany::class, 'company_group_id');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class)->using(CompanyRegion::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->using(CompanyCategory::class);
    }

    public function companyAlerts()
    {
        return $this->HasMany(CompanyAlert::class);
    }
    public function friendsByCompany()
    {
        return $this->HasMany(UsersFriedsByCompany::class);
    }

    public function histories()
    {
        return $this->HasMany(HistoryUsersCompany::class);
    }

    public function products()
    {
        return $this->HasMany(Product::class);
    }

    public function promocodes()
    {
        return $this->HasMany(Promocode::class);
    }

    public function advertising()
    {
        return $this->HasMany(CompanyAdvertising::class);
    }

    public function financesAndTariffs()
    {
        return $this->HasMany(FinanceAndTariff::class);
    }

    public function financeHistory()
    {
        return $this->HasMany(FinanceHistory::class);
    }
}
