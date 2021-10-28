<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Profiler\Profile;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = ['title', 'description', 'notification_type', 'user_id', 'object_id', 'object_type', 'is_seen'];
    protected $appends = ['image'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getImageAttribute(){
        $image = null;
        if($this->object_type == 'company'){
            $image = Company::where('id', $this->object_id)->value('image');
        }
        if($this->object_type == 'user'){
            $image = Profile::where('user_id', $this->object_id)->value('avatar');
        }
        return $image;
    }
}
