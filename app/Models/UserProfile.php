<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';
    protected $fillable = ['user_id', 'name', 'phone', 'country', 'region', 'address', 'messengers', 'avatar' ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
