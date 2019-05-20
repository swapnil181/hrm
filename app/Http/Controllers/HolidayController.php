<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use App\Models\Holiday;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


class HolidayController extends Controller
{
	/**
	 * -----------------------------------------------------------------------------
	 *   HolidayController class
	 * -----------------------------------------------------------------------------
	 * Controller having methods to create holiday,
	 * and show holiday on calender.This class consists of
	 * methods to create , edit, update holiday. 
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
	 * HolidayController class Constructor
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
	 *  Load the view file of create holiday form 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */  
	public function holiday(){ 
		$data=Holiday::all();	
		// print_r($data); die(); 
		$holiday = [];
		// print_r($event); die(); 

		foreach ($data as  $value) {
				$enddate=$value->holiday. "24:00:00";
				$holiday[]=\Calendar::event(
				$value->holiday_title,
				true,
				new \DateTime($value->holiday),
				new \DateTime($value->holiday),
				$value->_id
				
			);
			
    		}
			  // print_r($holiday); die();
			$calendar= \Calendar::addEvents($holiday);	
			 // print($calendar); die();
	    	return view('users.test', compact('data','calendar'));

    	}	
//----------------------------------------------------------------------

    public function showHolidays()
    	{
	    	$data=Holiday::all();		
    		//print_r($data); die();
    	    return view('users.holiday')->with('holiday',$data);

    	}
//---------------------------------------------------------------------
	 /**
	 *  Create holiday and store holiday into holiday collection
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */ 

	  public function createHoliday(){
	  	
	  	$data=$this->request->all();
	  	// print_r($data); die();
	  	  $tag=$data['holiday_description'];
    	$holiday=strip_tags($tag);
    	$string = preg_replace('/\s+/', '', $holiday);
    	$data['holiday_description']=$holiday;
    	// print_r($data);	die();
	  	$validator=Validator::make($data,[
							'holiday'       	  => 'required',
							'holiday_title'		  => 'required',
							'holiday_description' => 'required|min:10',
		]);
		
		if(!$validator->fails()){
			$holiday=Holiday::create($data);
			if ($holiday) {
				return "success";
			}
			else{
				return "fail";
			}
			
		}
		else{
			return response()->json(['errors'=>$validator->errors()->all()]);
			}
	  }
//-----------------------------------------------------------------------
	 /**
	 *  To edit the Holiday details
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */ 
	  public function editHoliday(){
	  		$data=$this->request->all();
	  		// print_r($data);die();
	  		$data=Holiday::where('_id',$data['id'])->first();
	  		 // print_r($data['_id']); die();
	  		return view('users.edit_holiday')->with('holiday',$data);
	  }	
	  //-----------------------------------------------------------------------

	  /**
	 *  To update the Holiday details
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */	
	  public function updateHoliday(){

	  		$data=$this->request->all();
	  		 // print_r($data); die();

	  		Holiday::where('_id',$data['employee_id'])->update($data);
	  		
	  		return redirect('showHolidays');
	  }
	  //-----------------------------------------------------------------------

	 /**
	 *  To delete the Holiday
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */									
	 
	public function deleteHoliday($id){
	  	// print_r($id); die();	
  		$delete=Holiday::where('_id',$id)->delete();
  		if ($delete) {
  			$data=Holiday::all();
  			return $data;
  		}
  		else{
  			return "fail";
  		}

	  	}
//-------------------------------------------------------------------------	  					
} 
