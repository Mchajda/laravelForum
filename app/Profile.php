<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user(){
        return $this->hasOne(User::class);
    }

    public function __construct($user_name)
    {
        $this->user_name = $user_name;
        $this->user_status = "user";
        $this->posts_number = 0;
    }
}
