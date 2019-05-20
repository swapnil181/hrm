<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Leave extends Eloquent
{	
    use SoftDeletes;
    /** 
      * Connection name.
      *
      */
    protected $connection= 'mongodb';

    /** 
      * Collection name.
      *
      */
     protected $collection = 'leave';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
                'employee_id',
     						'leave_reason',
     						'leave_type',
     						'from_date',
     						'to_date',
     						'total_days',
                'status',
                'availableLeaves',
                'totalLeavesTaken',
                'paidLeaves'

     					   ];
    
 
}
