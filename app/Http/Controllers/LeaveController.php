<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Leave;
use Auth;

class LeaveController extends Controller

{
	/**
	 * -----------------------------------------------------------------------------
	 *   LeaveController class
	 * -----------------------------------------------------------------------------
	 * Controller having methods to handle Leave requests,
	 * leave details.This class consists of
	 * methods to show leave form, show leave details of employee. 
	 *
	 *
	 * @package  App\Http\Controllers
	 * @since    1.0.0
	 * @version  1.0.0
	 * @author   Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 */

	/**
	 * Request 
	 * 
	 * @var     Illuminate\Http\Request
	 * @access  protected
	 * @since   1.0.0
	 * @version 1.0.0
	 *
	 */

	protected $request;

	/**
	 * LeaveController class Constructor
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

	public function __construct(Request $request) 
	{
	// Set the properties
	$this->request = $request;

	}
	//-------------------------------------------------------------------------
    
	/**
	 *  Load the view file of Leave request form
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */


    public function leave(){
    	
     	return view('leaves.leave_request');

    }
    //-------------------------------------------------------------------------
	
	/**
	 *  Load the view file of Leave request form
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */    
    public function leaveInfo(){
		
		return view('leaves.leaveInfo');
	}

    /**
	 *  Create leave request and store request into database
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

    public function LeaveRequest(){
    		
    	$data=$this->request->all();

    	 // print_r($data);die();
    	 // print_r($data['total_days']);die();
    	 //$Leave=Leave::where('employee_id',$data['employee_id'])->pluck('total_days')->toArray();

    	$Leave=Leave::where('status',"Approved")->where('employee_id',$data['employee_id'])->pluck('total_days')->toArray();

    	// print_r($Leave);die();             
    	// print_r(array_sum($Leave));die();
    	$totalLeavesTaken=array_sum($Leave)+$data['total_days'];
    	//print_r($totalLeavesTaken); die();
    	$days=$data['total_days'];
    	// print_r($data['total_leave']);die;
    	$available=($data['total_leaves']-$totalLeavesTaken);
    	//print_r($available);die();
    	
    	$validator=Validator::make($data,[
    						'leave_reason' =>'required|min:10',
    						'leave_type'   =>'required',
    						'from_date'	   =>'required',
    						'to_date'	   =>'required',
    						'total_days'   =>'required',		
										
										]);

    	if(!$validator->fails()){
    		if ($totalLeavesTaken>=$data['total_leaves']) {

    			$data['paidLeaves']=$days;
    			// print_r($data);die();
    			Leave::create($data);
    		}
    		else{
				$data['availableLeaves']=$available;	
				$data['totalLeavesTaken']=$totalLeavesTaken;
				 // print_r($data);die();
				$insertLeave=Leave::create($data);
				if($insertLeave){
					return "success";

				}
				else{
					return "fail";
				}
				return redirect('employee_dashboard');	
	    		}

   		}
   		else{
   			return response()->json(['errors'=>$validator->errors()->all()]); 
   			}

    }
    //-------------------------------------------------------------------------

    /**
	 *  To get employee leave details from database
	 	and display on admin dashboard
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	
	public function getLeaveDetails(){
		
		$data=Leave::all();
		// print_r($data);die();	
		return view('leaves.leave_details')->with('leaveData',$data);
	}

	//-------------------------------------------------------------------------

	/**
	 *  To get employee leave details from database
	 *	and display on employee dashboard
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

	public function showLeaveDetails(){
		
		$user=Auth::user();
		// print_r($user['employee_id']); die();	
		$data=Leave::where('employee_id',$user['employee_id'])->get();
		
		// print_r($data);die();
		return view('leaves.leaveInfo')->with('leaveData',$data);
	}

	//-------------------------------------------------------------------------	
	
	/**
	 *  To get employee leave details from database
	 *	and display on dashboard
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function leavedetails(){
		
		return view('leaves.leave_details');
	}

	//-------------------------------------------------------------------------
	
	 /**
	 *  To approve or reject the leave request
	 *	and send the status of leave request to employee
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

	public function approveLeave(){
	 			 		
 		$data=$this->request->all();
 		// $data['status']="Approved";
 		//print_r($data);	die();
 		// $data['status']="Approved";
 		$message=Leave::where('_id',$data['id'])->update($data);
 		
 		 if ($message) 
            {                       
                return "Success";
            }
            else{
                return "Fail";
                }

	 		// print_r($data); die();
	 		
	 	}		
	//-------------------------------------------------------------------------		    
}
