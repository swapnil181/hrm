<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use Validator;
use Auth;
use App\Models\Complaint;

class ComplaintController extends Controller
{	/**
	 * -----------------------------------------------------------------------------
	 *   CompliantController class
	 * -----------------------------------------------------------------------------
	 * Controller having methods to register complaint,
	 * and show complaints in table. 
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
	 * ComplaintController class Constructor
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
	 *  Load the view file complaint.blade.php 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

    public function Complaint(){

    	$user=Auth::user();

    	if($user->role=="Admin")
    	{
    		$data=Complaint::where('role',"Employee")->get();
    		// print_r($data);die();
    		return view ('users.complaints')->with('data',$data);
    	}
    	else{
    		$data=Complaint::where('complainer',$user['employee_id'])->get();
    		// print_r($data);die();
    		return view ('users.complaints')->with('data',$data);
    	}
    
    	// $data=Complaint::where('complainer',$user['employee_id'])->get();
    	// $data=Complaint::where('role',"Employee")->get();
    	// print_r($data);die();
    	// $data['names'] = Register::get()->pluck('name');
    	// print_r($data['names']);die();
    	// $employee=$data['names'];
    	// print_r($employee);die();
    	// return view ('users.complaints')->with('data',$data);
    }
    //-------------------------------------------------------------------------
   
    /**
	 *  Add the employee/ admin name to complaint select  
	 *  box dynamically
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
    public function getEmployee(Request $request){
    	
    	$data=$request->all();    	
    	// print_r($data);die();	
    	
    	$role=Register::where('role', $data['value'])->get();
    	// print_r($role);die();
    	if($role){
    	 	return $role;
    	}
    }
    
    //-------------------------------------------------------------------------

    /**
	 *  Store the complaint in the complaint collection in database 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */	

	public function registerComplaint(){
	 		
 		$data=$this->request->all();
 		// print_r($data);die();
 		$validator=Validator::make($data,[
							'complaint_against' =>'required',
							'reason'   			=>'required',			

									]);
		if(!$validator->fails()){
		
		Complaint::create($data);
		return "success";
		// return redirect('complaints');
		// print_r($data);die();
		}

 		else{		
 		return "fail";
 		}
	}

	//-------------------------------------------------------------------------	
	
	/**
	 * Retrieve the compliants data and 
	 * show the complaints in the table 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function showComplaints(){
		  
	   $data=Complaint::paginate(5);		
	   // print_r($data);die();
	   return view('users.adminComplaints')->with('data',$data);

	}		
	
	 //------------------------------------------------------------------------ 	

	public function replayComplaint(Request $request){
		$data=$request->all();
		// print_r($data['comment']);die();
		$msg['comment']=$data['comment'];
		// print_r($msg);die();
 		$replay=Complaint::where('_id',$data['id'])->update($msg);

 		if ($replay) {
 			return "success";	
 		}
	 	}	
	//-------------------------------------------------------------------------
	
	/**
	 * Function to delete the complaint 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function deleteComplaint($id){
		// print_r($id); die();
		$user=Auth::user();
		$delete=Complaint::where('_id',$id)->delete();
		if ($delete) {
		$data=Complaint::where('complainer',$user['employee_id'])->get();
		// print_r($data); die();	
			return $data;
		}
		else{
			return "fail";
		}
	}	
	//-------------------------------------------------------------------------

		    		   
}
