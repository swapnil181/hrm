<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hrm;
use App\User;
use App\Models\Register;
// use App\Models\Holiday;
use Auth;
use App\Mail\ResetPasswordMail;
use Alert;

class HrmController extends Controller
{ /**
   * -----------------------------------------------------------------------------
   *   HrmController class
   * -----------------------------------------------------------------------------
   * Controller having methods to load employee dashboard,
   * user profile details.This class consists of
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
   *  Load the view file of employee dashboard
   *
   * @access  public
   * @param   Illuminate\Http\Request $request
   * @return  Response
   * @since   1.0.0
   * @version 1.0.0
   * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
   * 
   */
    public function employeeDashboard(){
    
        return view('employee_dashboard');

   }

   //-------------------------------------------------------------------------
  /**
   *  To get employee leave details from register collection
   *   and show it on profile page
   *
   * @access  public
   * @param   Illuminate\Http\Request $request
   * @return  Response
   * @since   1.0.0
   * @version 1.0.0
   * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
   * 
   */
   public function profile(){
        
        $user= Auth::user();
       
        // print_r($user); die();
        //print_r($user['employee_id']); die();

        $data=Register::where('employee_id',$user['employee_id'])->first();       
          // print_r($data); die();
        return view('users.profile')->with('data',$data);
   }
   //--------------------------------------------------------------------------

  /**
   *  To show landing page where user can login
   *
   * @access  public
   * @param   Illuminate\Http\Request $request
   * @return  Response
   * @since   1.0.0
   * @version 1.0.0
   * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
   * 
   */
   public function landing(){

       // Alert::success('welcome to nprodax!!');
      // Alert::message('Thanks for comment!')->persistent('Close');

       return view('landing');
   }
   //--------------------------------------------------------------------------

   public function test(){
      
       return view('users.test');
   }
   //--------------------------------------------------------------------------

   public function calendar(){
      
       return view('users.calender');
   }
   //--------------------------------------------------------------------------
  
   public function update_profile(){
        
        $user= Auth::user();
        // print_r($user); die();
        // print_r($user['employee_id']); die();
        $data=Register::where('employee_id',$user['employee_id'])->first();
        // print_r($data); die();
        return view('users.update_profile')->with('data',$data);

   }
   //--------------------------------------------------------------------------
    
}


