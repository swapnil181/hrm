<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Auth;
use Validator;

class EventController extends Controller
{
	/**
	 * -----------------------------------------------------------------------------
	 *   EventController class
	 * -----------------------------------------------------------------------------
	 * Controller having methods to create event,
	 * and show event on calender.This class consists of
	 * methods to create , edit, update event. 
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
	 * EventController class Constructor
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
	 *  Load the view file of create event form 
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */

    public function event(){
    	
   		 return view('event.event');
    }
    //-------------------------------------------------------------------------

    /**
	 *  Load the view file event request data table to admin
	 *
	 * @access  public
	 * @param   Illuminate\Http\Request $request
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function eventrequest(){

		$data=Event::all();
		 // print_r($data);die();				
		
		return view('event.event_request')->with('event',$data);
	}
	//-------------------------------------------------------------------------

	/**
	 *  Load the view file event details data table to employee
	 *
	 * @access  public
	 * @param   Illuminate\Http\deatils $details
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
	public function eventdetails(){

		$user=Auth::user();
		$data=Event::where('event_request',$user['name'])->paginate(10);
		 // print_r($data);die();
		
		return view('event.event_details')->with('data',$data);
	}

    //-------------------------------------------------------------------------
	/**
	 *  Store the event details in event collection
	 *
	 * @access  public
	 * @param   Illuminate\Http\deatils $details
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
    public function createEvent(){
    	
    	$data=$this->request->all();
    	// print_r($data['event_discription']);die();
    	$tag=$data['event_discription'];
    	$events=strip_tags($tag);
    	// print_r($events);die();
    	$validator=Validator::make($data,[
							'event_Name'       	=> 'required',
							'event_date'		=> 'required',
							'event_discription' => 'required|min:10',
		]);

		if(!$validator->fails()){
			$event=Event::create($data);
			if ($event) {
				return "Success";
			}
			else{
				return "fail";
			}
		}

		else{
			return redirect('event')->withErrors($validator);
		}
    	// print_r($data);die();
    }

    //-------------------------------------------------------------------------		
    /**
	 *  Updating the status of event
	 *
	 * @access  public
	 * @param   Illuminate\Http\deatils $details
	 * @return  Response
	 * @since   1.0.0
	 * @version 1.0.0
	 * @author  Nprodax Technologies Pvt Ltd <mbk@nprodax.com>
	 * 
	 */
    public function approveEvent(){
    	
    	$data=$this->request->all();
    	
    	 // print_r($data['value']);die();
    	$status=$data['value'];
    	$state['status']=$status;
    	$event=Event::where('_id',$data['id'])->update($state);

    	if($event){
    		return "Success";
    	}
    	// print_r($event);die();
    	 // return view('');
    }
    //-------------------------------------------------------------------------		
    
}
