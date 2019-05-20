<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class PasswordReset extends Eloquent
{
        /** 
      * Connection name.
      *
      */
    protected $connection= 'mongodb';

    /** 
      * Collection name.
      *
      */
     protected $collection = 'resetPassword';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email',
    						'token'
     					  ];
}
