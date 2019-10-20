<?php

namespace NickelCms\Installer\Models;

use Jenssegers\Mongodb\Auth\User as Authenticatable;


class User extends Authenticatable
{

    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'user_email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


}
