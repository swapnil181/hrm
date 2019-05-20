@extends('layouts.master')
@section('content')

<!------ Include the above in your HEAD tag ---------->
@if($user=Auth::user())
    <!-- <h1>Welcome {{$user['name']}}</h1> -->
  @endif
   <div class="container">
            <h1 class="">Update Profile</h1>

 	        <div class="col-md-5">
            </div>
                <div class="col-lg-12 well">
	            <div class="row">
				<form method="post" action="{{ url('update') }}"
                     enctype="multipart/form-data">
						<div class="row">    						
	                    </div>
	                    <div class="col-sm-6 form-group">
    						<label> Employee Id</label>
    						<input type="text"  class="form-control"  readonly 
                            value="{{$data->employee_id}}">
    					</div>
    					<div class="col-sm-6 form-group">
    						<label>Full Name</label>
    						<input type="text" name="name" class="form-control"
                             value="{{$data->name}}">  
    					</div>
                        <div class="col-sm-6 form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                
                            @if($user['role']=="EscalationManager")
                            <option value="EscalationManager" selected="select">EscalationManager</option>
                            @else
                            <option value="EscalationManager">Escalation Manager</option>
                            @endif

                            @if($user['role']=="Admin")
                            <option value="Admin" selected="select">Admin</option>
                            @else
                            <option value="Admin">Admin</option>
                            @endif

                            @if($user['role']=="Employee")
                            <option value="Employee" selected="select">Employee</option>
                            @else
                            <option value="Employee">Employee</option>
                            @endif
                          </select>  
                        </div>
    					
                        <div class="col-sm-6 form-group">
    							<label>Mobile Number</label>
    							<input type="text" placeholder="Mobile Number"
                                 class="form-control" name="mobile" 
                                 value="{{$data->mobile}}">
    					</div>
    				    
                        <div class="col-sm-6 form-group">
                        <label>Email Address</label>
                        <input type="text" placeholder="Email Address" class="form-control" name="email" value="{{$data->email}}">
                        </div>


                        <div class="col-sm-6 form-group">
                        <label>Bank Name</label>
                        <input type="text" placeholder="Bank Name" class="form-control" name="bank_name" value="">
                        </div>
                        
                        <div class="col-sm-6 form-group">
                        <label>Bank Account NO.</label>
                        <input type="text" placeholder="Bank Account NO." class="form-control" name="bank_account" value="">
                        </div>  

                         
                        <div class="col-sm-6 form-group">
                        <label>IFSC Code</label>
                        <input type="text" placeholder="IFSC Code" class="form-control" name="ifsc_code" value="">
                        </div>  

                         
                        <div class="col-sm-6 form-group">
                        <label>Bank Address</label>
                        <input type="text" placeholder="Bank Address" class="form-control" name="bank_address" value="">
                        </div>  

                         <div class="col-sm-6 form-group">
                        <label>Pan NO.</label>
                        <input type="text" placeholder="Pan NO." class="form-control" name="Pan_no." value="">
                        </div>   
                        
                         <div class="col-sm-6 form-group">
    					<label>Adhar No.</label>
    					<input type="text" placeholder="Adhar NO." class="form-control" name="adhar_no." value="{{$data->adhar_no}}">
    				    </div>	 
    					
    				<div class="col-sm-6 form-group">
    						<label>Date of Birth</label>
    						<input type="date"  class="form-control" name="dob" value="{{$data->dob}}">
    				</div> 

					<div class="col-sm-6 form-group">
						<label>Gender</label>
						<select class="form-control" name="gender">
						    <option value="male">Male</option>
						    <option value="female">Female</option>
						</select>
					</div>

                    <div class="col-sm-6 form-group">
                            <label>Joining Date</label>
                            <input type="date" class="form-control" name="joining_date" value="{{$data->joining_date}}">
                    </div>  

					<div class="col-sm-6 form-group">
    					<label>Permanent Address</label>
    					<textarea placeholder="Permanent Address " rows="5" class="form-control" name="permanent_address">
                            {{$data->permanent_address}}</textarea>
    				</div>	

    				<div class="col-sm-6 form-group">
    					<label>Current Address</label>
    					<textarea placeholder="Current Address " rows="5"
                         class="form-control"  name="current_address">
                         {{$data->current_address}}</textarea>
    				</div>
    					 
                    <div style="padding-left: 1.5%">
    	               <div ><label>Languages Known</label>
                    </div>
                    <div class="row"></div>
                   <div class="col-md-2"></div>
                    <div class="col-md-3">
                   
                   <div class="i-checks">
                    <label> 

                    <input type="checkbox" name="language[]" id="english"
                     value="English">English</label>
                    </div>
                                        
                  <div class="i-checks">
                    <label> 
                    <input type="checkbox" name="language[]" id="Telugu"

                     value="Telugu"> Telugu</label>
                    </div>
                    </div>

                    <div class="col-md-3">
                    <div class="i-checks">
                    <label> 
                    <input type="checkbox" value="Hindi" id="Hindi"
                            name="language[]"
                    <i></i>Hindi</label>

                    <div class="i-checks">
                    <label>
                    <input type="checkbox" value="Malayalam" id="Malayalam"
                            name="language[]"><i></i> Malayalam</label>
                    </div>
                     </div> 
                    </div>

                    <div class="col-md-4">
                    <div class="i-checks">
                    <label> 
                    <input type="checkbox" value="Marathi" id="Marathi"

                             name="language[]">Marathi</label>
                    </div>
                    </div>  
            <div class="row"></div>
                               
            <div style="padding-left: 0.5%">
					<label>Upload Photo</label>
					<input type="file" name="photo" id="photo">
            </div> 
			<div class="hr-line-dashed form-group"> </div>

			<div class="form-group">
            <label class="col-md-5 control-label" for="submit"></label>
            <div class="col-md-5">
            <button type="submit" class="btn btn-primary"
             style="width: 150px">Submit</button>
            </div>
            </div>
    </div>
</div>  
@endsection

@section('myScript')

@endsection
