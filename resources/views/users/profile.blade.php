@extends('layouts.master')
@section('content')
<!------ Include the above in your HEAD tag ---------->
@if($user=Auth::user())
    <h1>Welcome {{$user['name']}}</h1>
@endif

<div class="container">            
<h1 class="">Employee Profile</h1>

<div class="col-md-5"></div>           

  <div class="col-lg-12 well">
	<div class="row">
	<form id="profileForm" method="post" action="{{ url('update') }}" 
        enctype="multipart/form-data">
	
  	<div class="row">    						                 
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
  </div>
    <div class="row">
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
		<input type="text" placeholder="Mobile Number" class="form-control" name="mobile" value="{{$data->mobile}}">
	</div>
</div>
<div class="row">    
    <div class="col-sm-6 form-group">
    <label>Email Address</label>
    <input type="text" placeholder="Email Address" class="form-control" name="email" value="{{$data->email}}">
    </div>

    <div class="col-sm-6 form-group">
    <label>Bank Name</label>
    <input type="text" placeholder="Bank Name" class="form-control" name="bank_name" value="{{$data->bank_name}}">
    </div>
</div>    
<div class="row">    
    <div class="col-sm-6 form-group">
    <label>Bank Account NO.</label>
    <input type="text" placeholder="Bank Account NO." class="form-control" name="bank_account" value="{{$data->bank_account}}">
    </div>  

     
    <div class="col-sm-6 form-group">
    <label>IFSC Code</label>
    <input type="text" placeholder="IFSC Code" class="form-control" name="ifsc_code" value="{{$data->ifsc_code}}">
    </div>  
</div>
<div class="row">     
    <div class="col-sm-6 form-group">
        <label>Bank Address</label>
        <input type="text" placeholder="Bank Address" class="form-control" 
        name="bank_address" value="{{$data->bank_address}}">
    </div>  

    <div class="col-sm-6 form-group">
         <label>Pan NO.</label>
         <input type="text" placeholder="Pan NO." class="form-control" name="Pan_no" id="Pan_no_" value="{{$data->Pan_no}}">
    </div>   
</div>
<div class="row">   
    <div class="col-sm-6 form-group">
	    <label>Adhar No.</label>
	    <input type="text" placeholder="Adhar NO." class="form-control"
         name="adhar_no_" id="adhar_no" value="{{$data->adhar_no_}}">
    </div>	 
	
	<div class="col-sm-6 form-group">
			<label>Date of Birth</label>
			<input type="date"  class="form-control" name="dob" value="{{$data->dob}}">
	</div> 
</div>
<div class="row">
	<div class="col-sm-6 form-group">
		<label>Gender</label>
		<select class="form-control" name="gender">
		    <option value="male">Male</option>
		    <option value="female">Female</option>
		</select>
	</div>

    <div class="col-sm-6 form-group">
            <label>Joining Date</label>
            <input type="date" class="form-control" name="joining_date" 
                    value="{{$data->joining_date}}">
    </div>  
</div>
<div class="row">
	<div class="col-sm-6 form-group">
		<label>Permanent Address</label>
		<textarea placeholder="Permanent Address " rows="5" class="form-control" name="permanent_address" id="permanent_address">{{$data->permanent_address}}
    </textarea>
	</div>	


	<div class="col-sm-6 form-group">
    <label>Current Address &nbsp;</label> 
    <input type="checkbox" name="address" id="sameAddress">
    Same as permenant address

		<textarea placeholder="Current Address " rows="5"
         class="form-control"  name="current_address" id="current_address">
         {{$data->current_address}}</textarea>
	</div>
</div>		           
   <div class="row"></div>
    <div class="col md-3">
        <b>Select Languages:</b>
    </div>
    <div class="row">
        <div class="col-md-3">
         <div class="i-checks">
          <label> 
          <input type="checkbox" name="language[]" id="Telugu"
          @if ($data->language)
              {{in_array("Telugu", $data->language) ? 'checked': ''}}
           value="Telugu"> Telugu</label>
           @else
            <input type="checkbox" name="language[]" id="Telugu"
            value="Telugu">Telugu
         @endif
          </div>
      </div>
      <div class="col-md-3">
        <div class="i-checks">
          <label> 
          <input type="checkbox" name="language[]" id="Marathi"
          @if ($data->language)
              {{in_array("Marathi", $data->language) ? 'checked': ''}}
           value="Marathi"> Marathi</label>
           @else
            <input type="checkbox" name="language[]" id="Marathi"
            value="Marathi">Marathi           
         @endif  
        </div>
      </div>
    <div class="col-md-3">             
           
        <div class="i-checks">
          <label> 
          <input type="checkbox" name="language[]" id="English"
          @if ($data->language)
              {{in_array("English", $data->language) ? 'checked': ''}}
           value="English"> English</label>
          @else 
          <input type="checkbox" name="language[]" id="English"
            value="English">English
         @endif  
        </div>         
</div>
<div class="col-md-3">
            <div class="i-checks">
          <label> 
          <input type="checkbox" name="language[]" id="Hindi"
          @if ($data->language)
              {{in_array("Hindi", $data->language) ? 'checked': ''}}
           value="Hindi"> Hindi</label>
           @else 
          <input type="checkbox" name="language[]" id="Hindi"
            value="Hindi">Hindi
         @endif  
        </div>
</div>
        </div>
    </div>
    
    <div class="row"></div>
                       
    <div style="padding-left: 0.5%">
            <label>Upload Photo</label>
            <input type="file" name="photo" id="photo">
    </div> 

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
<script>
    var address = $('textarea#permanent_address').val();
    // var address= $("#permanent_address").val()  
       // alert(address)
    var ckbox = $('#sameAddress');

    $('#sameAddress').on('click',function () {
          var address = $('textarea#permanent_address').val();
        if (ckbox.is(':checked')) {
           // alert(address)
          // alert('You have Checked it');
          $('#current_address').text(address)
         // 
        }
        else{
          $('#current_address').empty()
        }
    });

    
  // }
  $('document').ready(function (){
    $('#profileForm').validate({
      rules:{
        bank_name:{
          required:true,
        },
        name:{
          required:true,
        },
        permanent_address:{
          required:true,
        },
        Pan_no:{
          required:true,
          maxlength:10,
          minlength:10,
        },
        current_address:{
          required:true,
        },
          adhar_no:{
          required:$('#adhar_no').bind('keypress', function (event) {
                     var regex = new RegExp("^[0-9]+$");
                     var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
                     if (!regex.test(key)) {
                     event.preventDefault();
                     return false;
                    }
                  }),
          maxlength:12,
          minlength:12,
        
          },
          bank_address:{
          required:true,
          },
          bank_account:{
          required:true,
          digits: true,
          }
      },
      messages:{
        adhar_no:{
          maxlength:"Adhar card should be  12 digits only",
        }
      }
    })
  })
</script>
@endsection
