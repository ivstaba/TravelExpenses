<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'users';
    
    protected $guard = "admins";
    
    protected $hidden = [
      'password', 'remember_token',  
    ];
}
