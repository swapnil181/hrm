<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Promotion;
use Auth;
use Validator;
class PromotionController extends Controller
{
	/**
	 * -----------------------------------------------------------------------------
	 *   PromotionController class
	 * -----------------------------------------------------------------------------
	 * Controller having methods to handle promotion requests,
	 * .This class consists of methods to show promotion request form. 
	 *	Promotion requests data table
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
	 * PromotionController class Constructor
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
		public function promotion(){
    	
    	return view('promotion.promotion');
    }

	//-------------------------------------------------------------------------

	/**
	 * store the promotion request into promotion collection
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function promotionRequest(){
		
		$data=$this->request->all();

		 // print_r($data);die();
		$validator=Validator::make($data,[
								'request'=>'required|min:10',
								]);

		if(!$validator->fails()){
			$promotion=Promotion::create($data);
			if($promotion){
				return "success";

			}	
			else{
				return "fail";
			}
		}
		else{
			return response()->json(['errors'=>$validator->errors()->all()]);
			// return redirect('promotion')->withErrors($validator);
		}
		
		
		
	}
	//-------------------------------------------------------------------------

	/**
	 *  To get promotion requests data from database
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
	
	    public function promotion_details(){
    	
    	$data=Promotion::all();
    	// print_r($data);die();
    	return view('promotion.promotion_details')->with('data',$data);
    }
	//-------------------------------------------------------------------------

    /**
	 *  To get promotion response of employee promotion request
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
    public function promotion_status(){
    	$user=Auth::user();
    	
    	$data=Promotion::where('employee_id',$user['employee_id'])->get();
    	//print_r($resign);die();
    	return view ('promotion.promotion_status')->with('data',$data);
    }
    //-------------------------------------------------------------------------
	/**
	 *  Aprrove or reject the request of Promotion.
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
    public function approvePromotion(Request $request){
    	
    	$data=$request->all();
    	 // print_r($data);die();
    	$promotion=Promotion::where('_id',$data['id'])->update($data);
    
    	if ($promotion) {
    		return "success";
    	}
    	//return redirect('promotion_details');
    }
}
