<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['user_id', 'profile_picture'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
