<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ResetPassword extends Eloquent
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
