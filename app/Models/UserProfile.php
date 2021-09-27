<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';
    protected $fillable = ['user_id', 'name', 'phone', 'country', 'region', 'address', 'messengers', 'avatar' ];
    protected $casts = [
        'messengers' => 'array'
    ];
    protected $appends = ["score", 'debitings', 'offs'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getScoreAttribute(){
        $debitings = HistoryUsersCompany::where(['user_id'=> $this->user_id, 'type'=>'Начисление'])->sum('value');
        $offs = HistoryUsersCompany::where(['user_id'=> $this->user_id, 'type'=>'Списание'])->sum('value');
        if($debitings>$offs){
            return $debitings-$offs;
        }
        return 0;

    }
    public function getDebitingsAttribute(){
        $debitings = HistoryUsersCompany::where(['user_id'=> $this->user_id, 'type'=>'Начисление'])->sum('value');
        if(!is_null($debitings)){
            return $debitings;
        }
        return 0;

    }
    public function getOffsAttribute(){
        $offs = HistoryUsersCompany::where(['user_id'=> $this->user_id, 'type'=>'Списание'])->sum('value');
        if(!is_null($offs)){
            return $offs;
        }
        return 0;

    }
}
