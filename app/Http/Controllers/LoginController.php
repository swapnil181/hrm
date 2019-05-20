<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Config;
use Auth;
use App\User;
use Mail;
use Illuminate\Support\MessageBag;
use App\Models\Register;
use App\Mail\ResetPasswordMail;
use Alert;

class LoginController extends Controller
{
	/**
	 * ------------------------------------------------------------------------
	 *   LoginController class
	 * ------------------------------------------------------------------------
	 * Controller having methods to handle user login, 
	 *	and logout.
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
	 * LoginController class Constructor
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
	 *  Load the view file of Login-form
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	
	public function login(){
		return view('login');
	}

	//-------------------------------------------------------------------------

	/**
	 *  Handle login request
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

	public function doLogin(request $request){

		$data=$request->all();
		//print_r($data); die();

		$validator=Validator::make($data,[
							'email'     => 'required|email|exists:user,email',
							'password' => 'required',
		]);

		if(!$validator->fails()){

			$userdata=array('email'=>$data['email'],
							'password'=>$data['password']
						    );
			if (Auth::attempt($userdata)) {
				
				$user=Auth::user();
				// print_r($user); die();
				// return redirect('data');
				// return redirect('form');
				$userdata=Register::where('employee_id',$user['employee_id'])->first();
				// print_r($userdata); die();
				$response['status'] = Config::get('constants.HTTP_OK');
                $response['data'] =[];
                $response['message'] = "Logged In successfully";
                 

            if($user->role == 'Admin' || $user->role =='EscalationManager'){
                   return "Success";
                   Mail::send(new ResetPasswordMail());
                   // print_r($userdata); die();

                }
            else if($user->role == 'Employee'){
                	
                	return "Employee";
                	Mail::send(new ResetPasswordMail());
                	// return $userdata;
                	// print_r($userdata); die();
                }
				}
			else {
				return "fail";	
                $response['status'] = Config::get('constants.HTTP_BAD_REQUEST');
                $response['data'] = [];                
                $response['message'] = "fail";
            }
        	}
     	   else { 
        	    return response()->json(['errors'=>$validator->errors()->all()]);
            	$response['status'] = Config::get('constants.HTTP_BAD_REQUEST');
            	$response['data'] = [];
            	$response['message'] = $validator->errors();
        }

        	    return response()->json($response,Config::get('constants.HTTP_OK'));	
	}
	//-------------------------------------------------------------------------

	/**
	 *  Handle logout request
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

	public function logout(Request $request){
		
		$request->session()->flush();

        $data=Auth::logout();

        return redirect('/');
	}
	//-------------------------------------------------------------------------
	
	public function send(){
 	
 		Mail::send(new ResetPasswordMail());

		// return view('');
	}		
	
}	