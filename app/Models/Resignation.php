<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Resignation extends Eloquent
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
    protected $collection = 'resignation';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
        protected $fillable = [
        						'employee_id',
        						'reason'	
     	      						];
}
