<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HrmController@landing')->name('login');

Route::post('login','LoginController@doLogin');
Route::get('complaints','ComplaintController@Complaint')->middleware('auth');

Route::group(['middleware'=>['auth','CheckEmployee']], function () {

Route::get('employee_dashboard','HrmController@profile');
	
Route::get('leave','LeaveController@leave');

Route::get('event','EventController@event');

Route::get('promotion','PromotionController@promotion');

Route::get('resignation','ResignationController@resignation');

Route::get('showLeaveDetails','LeaveController@showLeaveDetails');

Route::get('promotion_status','PromotionController@promotion_status');

Route::get('resignation_status','ResignationController@resignation_status');

Route::get('deleteComplaint/{id}', 'ComplaintController@deleteComplaint');
});


Route::group(['middleware'=>['auth','CheckRole']],function (){

Route::get('admin_dashboard','RegisterController@getUserData');

//-----------------Employee Registraion Model----------------------------------

Route::get('register','RegisterController@form');

Route::post('insert','RegisterController@create');

Route::get('edit/{employeeid}','RegisterController@edit');

Route::get('view/{employeeid}','RegisterController@view');

Route::get('delete/{employeeid}','RegisterController@deleteEmployee');

Route::get('getleave_details','LeaveController@getLeaveDetails');

Route::get('event_request','EventController@eventrequest');

Route::get('promotion_details','PromotionController@promotion_details');

Route::get('resignation_details','ResignationController@resignation_details');

//-----------------Holiday Model-----------------------------------------------

Route::get('showHolidays','HolidayController@showHolidays');

Route::post('createHoliday','HolidayController@createHoliday');

Route::get('editHoliday','HolidayController@editHoliday');

Route::get('deleteHoliday/{holiday}','HolidayController@deleteHoliday');

Route::post('updateHoliday','HolidayController@updateHoliday');

Route::get('showComplaints','ComplaintController@showComplaints');

});

Route::get('calendar','HrmController@calendar');

Route::get('test','HrmController@test');

Route::get('send','LoginController@send');

Route::get('profile','HrmController@profile');

Route::get('update_profile','HrmController@update_profile');
 
//-------------------Employee Login Model--------------------------------------

Route::get('logout','LoginController@logout');

Route::get('forgot_password','ForgotPasswordController@forget_password');

Route::post('update','RegisterController@updateEmployeeData');	

Route::get('reset_password','ForgotPasswordController@resetPassword');

//-----------------Employee Leave Model----------------------------------------

Route::post('leave_request','LeaveController@LeaveRequest');

// Route::get('leaveInfo','LeaveController@leaveInfo');

Route::post('approveLeave','LeaveController@approveLeave');
 
Route::get('holiday','HolidayController@holiday');  
 
//-----------------Event Model-------------------------------------------------

Route::post('createEvent','EventController@createEvent'); 

Route::get('event_details','EventController@eventdetails');

Route::post('approveEvent','EventController@approveEvent');


//-----------------Complaint Model---------------------------------------------
 
 Route::post('getEmployee','ComplaintController@getEmployee');

 Route::post('registerComplaint','ComplaintController@registerComplaint');

 // Route::get('adminComplaints','ComplaintController@adminComplaints');

 Route::post('replayComplaint','ComplaintController@replayComplaint');

//-----------------Employeeresignation-------------------------------------

Route::post('resignationRequest','ResignationController@resignationRequest');
  
Route::post('approveResign','ResignationController@approveResign');
  


  //--------------Employee Promotion ------------------------------------------ 

Route::post('promotionRequest','PromotionController@promotionRequest');
  
Route::post('approvePromotion','PromotionController@approvePromotion');
 
//-------------------------Forgot Password ------------------------------------
Route::get('forgot_password','ForgotPasswordController@forget_password');

Route::post('sendForgotPasswordLink','ForgotPasswordController@sendForgotPasswordLink');

Route::get('reset_password/{token}','ForgotPasswordController@resetPassword');

Route::get('passwordErrors','ForgotPasswordController@passwordErrors');

Route::post('setNewPassword','ForgotPasswordController@setNewPassword');

Route::get('downloadPDF/{id}','HrmController@downloadPDF');


