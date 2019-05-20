<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Auth;
use Validator;
use App\Models\Register;
use App\User;	
use File;

class RegisterController extends Controller
{
 	/**
	 * -----------------------------------------------------------------------------
	 *   RegisterController class
	 * -----------------------------------------------------------------------------
	 * Controller having methods to handle user registartion,
	 * validation, view and update details.This class consists of
	 * methods that are used to perform the basic operations
	 * on user data such as user creation,  updation etc.
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
	 * RegisterController class Constructor
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
	 *  Load the view file of Registraion-form
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	
	public function form(){
		
		return view('users.employeeRegistration');
	}
	//-------------------------------------------------------------------------

	/**
	 *  Validate form input and insert user record into database 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function create(){

		$data=$this->request->all();
		  // print_r($data); die();	
		$validator=Validator::make($data,[
							'name'    	   => 'required',
							'mobile'       => 'required',
							'email'    	   => 'required|unique:register',
							'dob'    	   => 'required',
							'password' 	   => 'required',
							'joining_date' => 'required',
							'role'         => 'required'

							]);
		// $validator=true;
		if(!$validator->fails()){
			// print_r($data); die();
			$data['password']=bcrypt($data['password']);
				// print_r($data); die();

			$employeeId=User::orderBy('created_at','desc')->first();
			
			// print_r($employeeId); die();
			$employeeId=($employeeId['employee_id']+1);
			//print_r($employeeId); die();
			$employeeId=sprintf("%05d",$employeeId); 
			//print_r($employeeId); die();
			$data['employee_id']=$employeeId;
			
			//print_r($data); die();

			User::create($data);

			$user=Register::create($data);

			if ($user) {
				return "Success";
			}
			else{
				return "Fail";
			}
			// print_r($user); die();
			
			return redirect('admin_dashboard');

		}else{
			return response()->json(['errors'=>$validator->errors()->all()]);
			$response['status'] = Config::get('constants.HTTP_BAD_REQUEST');
            $response['data'] = [];
            $response= $validator->errors();

		}
		return response()->json($response, Config::get('constants.HTTP_OK'));

	}

	//-------------------------------------------------------------------------

	/**
	 *  To get employee data from database
	 	and display on dashboard
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	
	public function getUserData(){
		
		$data=Register::paginate(5);

		// print_r($data);die();	
		return view('users.employeeRegistration')->with('employeedata',$data);
	}
	//-------------------------------------------------------------------------

	/**
	 *  To edit the employee data   
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function edit($employeeid){
		
		$data=Register::all()->where('employee_id',$employeeid)->first();
		// print_r($data); die();
		return view('users.editEmployee')->with('data',$data);
	}	

	//----------------------------------------------------------------------	
		/**
	 *  To Update the employee data 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function updateEmployeeData(Request $request){
		
		$user=Auth::user();
		 // print_r($user); die();
		$data=$request->all();
		    	 // print_r($data); die();
		if($request->hasFile('photo')){
			 // die("ok");
            $filename=$this->request->photo->getClientOriginalName();

    	               $this->request->photo->storeAs('public',$filename);         
    		// print_r($filename); die();
			$data['photo'] = $filename;
	
			$photo['profile_photo']=$data['photo'];
			 // print_r($photo);die();
			$update=Register::where('employee_id',$user['employee_id'])
							->update($data);
			User::where('employee_id',$user['employee_id'])->update($photo);
			
			return back();	
			}
			else if($user['profile_photo']){
				// print_r($data); die();
			$update=Register::where('employee_id',$user['employee_id'])
							->update($data);
			// print_r($update); die();					
			return back();	
		}				
	}	
	/**
	 *  To Show the employee data 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	//-------------------------------------------------------------------------

	public function view($employeeid){
		
		$data=Register::all()->where('employee_id',$employeeid)->first();
		// print_r($data); die();
		return view('users.viewEmployeeData')->with('data',$data);
	}	
	//-------------------------------------------------------------------------

	/**
	 *  To delete the employee data 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

	public function deleteEmployee($employee_id){
		// print_r($employee_id);die();
		$delete=Register::where('employee_id',$employee_id)->delete();
		
		User::where('employee_id',$employee_id)->delete();
		
		if($delete){
			$data=Register::all();
			return $data;
		}
		else{
			return "fail";
		}
		// return redirect('admin_dashboard');
	}
	//-------------------------------------------------------------------------	
}
