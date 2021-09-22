<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryUsersCompany extends Model
{
    use HasFactory;
    protected $table = 'history_users_companies';
    protected $fillable = ['user_id', 'company_id', 'company_admin_id',
        'value', 'money_in_check', 'description', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'company_admin_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
