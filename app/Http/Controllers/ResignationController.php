<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resignation;
use Auth;
use Validator;
class ResignationController extends Controller
{

    /**
	 * -----------------------------------------------------------------------------
	 *   ResignationController class
	 * -----------------------------------------------------------------------------
	 * Controller having methods to handle Resignation requests,
	 * .This class consists of methods to show Resignation form. 
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
	 * ResignationController class Constructor
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
	 *  Load the view file of promotion request form
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
		public function resignation(){
    	
    	return view('resign.resignation');
    }

    //-------------------------------------------------------------------------

	/**
	 * store the resignation request into resignation collection
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function resignationRequest(){
		
		$data=$this->request->all();
		// print_r($data);die();
    	$validator=Validator::make($data,[
    						'reason'=>'required|max:20',				

										]);
    	if(!$validator->fails()){		

    		$resignation=Resignation::create($data);
    		if($resignation){
    			return "success";
    		}
    		else{
    			return "fail";
    		}
		// print_r($data);die();	
		}
		else{
			return response()->json(['errors'=>$validator->errors()->all()]);
		}
	
	}

	//-------------------------------------------------------------------------
	
	/**
	 *  To get resignation requests data from database
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
    public function resignation_details(){
    	
    	$data=Resignation::all();

    	return view('resign.resignation_details')->with('data',$data);
    	
 
    }
    //-------------------------------------------------------------------------
   	
   	/**
	 *  To get resignation response of employee resignation request
	 *  from database and display on dashboard
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
    public function resignation_status(){
    	$user=Auth::user();
    
    	$data=Resignation::where('employee_id',$user['employee_id'])->get();
    	//print_r($resign);die();
    	return view ('resign.resignation_status')->with('data',$data);
    }
    //-------------------------------------------------------------------------
   	
   	/**
	 *  Aprrove or reject the request of resignation.
	 *	Send Status and comment to employee.
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
    
    public function approveResign(Request $request){
    	$data=$request->all();
    	// print_r($data);die();
    	$resign=Resignation::where('_id',$data['id'])->update($data);
    
    	if ($resign) {
    		return "success";
    	}
    	//return redirect('resignation_details');
    }		
    

}
