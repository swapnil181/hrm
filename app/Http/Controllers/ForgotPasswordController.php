<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\PasswordReset;
use App\User;
use Mail;
use App\Mail\ResetPasswordMail;

class ForgotPasswordController extends Controller
{	/**
	 * ------------------------------------------------------------------------
	 *   ForgotPasswordController class
	 * ------------------------------------------------------------------------
	 * Controller having methods to send reset password email,
	 * 	 
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
	 *  Load the view file of forgot password page
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
    public function forget_password(){
		
		return view('users.forgot_password');
	}
	//-------------------------------------------------------------------------

	/**
	 *  Forgot password link
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function sendForgotPasswordLink(Request $request){
		
		$data=$request->all();
		 // print_r($data);die();
		$validator=Validator::make($data,[
					'email'=>'required|email']);
		if($validator->fails()){
			echo "invalid"; die();
			$response=$validator->errors();
		}
		else{

			$validator=Validator::make($data,[
						'email'=>'required|email|exists:user,email']);

			if($validator->fails()){
			print "invalid email"; die();
			$response=$validator->errors();
		}	
		else{
			$token=str_random(25);
			 // print_r($token);die();
			PasswordReset::create(['email'=>$data['email'],'token'=>$token]);
			Mail::to($data['email'])->send(new ResetPasswordMail($token));

			echo "Please check your mail to reset your password";
		}
		
		}
		
	}	
	//-------------------------------------------------------------------------	
	
	/**
	 *  Token verification and redirecting ser to reset password form
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function resetPassword($token){
		// print_r($token);die();
		$validator = Validator::make(['token' => $token], [
		                      'token' => 'required|exists:resetPassword,token'	      
		                      ]);
		 // print_r($token);die();
		 if ($validator->fails()) {
	      	
	      	return "Wrong token!";
	    }
	    else {	    	
	    	$user = PasswordReset::where('token',$token)->first();
	    	// print_r($user);die();
			return view('users.reset_password')
						->with('token', $token)
						->with('email', $user->email);
		  }

      	 return response()->json($response);
   	}
		
	//-------------------------------------------------------------------------

	public function setNewPassword(Request $request){
		
		$data=$request->all(); 
		 // print_r($data);die();
		$validator = Validator::make($data, [

	                      'password' => 'required|confirmed|min:6',

	                      ]); 
	    if (!$validator->fails()) {
	     	// print_r($data);die();
          	$password=PasswordReset::where('token',$data['token'])->first();
         	 	  // print_r($password['email']);die();
          	$updatePassword=User::where('email',$password['email'])
          	                   ->update(['password'=>bcrypt($data['password'])]);
          	 // print_r($updatePassword);die();    
          	return redirect('/');                 
         }
         else{
         	return view('users.passwordErrors')->withErrors($validator);
         }                   													

			return view('');
		}		
	}		
	

