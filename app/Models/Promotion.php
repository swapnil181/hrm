<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Eloquent
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
    protected $collection = 'promotion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        						'employee_id',
        						'request'	
     	      					  	 ];
}
