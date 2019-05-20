<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Holiday extends Eloquent 
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
     protected $collection = 'holiday';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
          protected $fillable = [
          						'holiday',
          						'holiday_title',
          						'holiday_description',		

     						  	 ];
}
