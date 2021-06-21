<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'telegram_chat_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function profile()
    {
        return $this->HasOne(UserProfile::class);
    }

    public function characteristics()
    {
        return $this->HasMany(UserCharacteristic::class);
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class)->using(UserAchievement::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class)->using(UserCompany::class);
    }

    public function friends()
    {
        return $this->HasMany(UsersFriedsByCompany::class);
    }

    public function histories()
    {
        return $this->HasMany(HistoryUsersCompany::class);
    }

    public function promocodes()
    {
        return $this->HasMany(Promocode::class);
    }

    public function activatedPromocodes()
    {
        return $this->belongsToMany(Promocode::class)->using(UserPromocode::class);
    }

    public function tariffs()
    {
        return $this->HasMany(Tariff::class);
    }

    public function advertising()
    {
        return $this->HasMany(CompanyAdvertising::class);
    }

}
