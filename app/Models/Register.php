<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Register extends Eloquent
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
     protected $collection = 'register';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
                            'employee_id',
                            'name',
     						'mobile',
     						'email',
     						'dob',
                            'gender',
     						'joining_date',
                            'permanent_address',
                            'current_address',
                            'language',
     						'role',
     						'password',
                            'bank_name',
                            'bank_account',
                            'ifsc_code',
                            'pan_no',
                            'adhar_no',
                            'bank_address'
     					   ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ]; 					   
}
