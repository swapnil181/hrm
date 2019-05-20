<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Event extends Eloquent
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
    protected $collection = 'event';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
                            'event_request',
                            'event_Name',
                            'event_discription',
                            'event_date'
     	      					  	 ];
}
