@extends('layouts.master')
@section('content')
@if($user=Auth::user())
   <h1>Welcome {{$user['name']}}</h1>
@endif   

@if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                            
   			<div class="container">
          <div class="alert alert-danger" style="display:none"></div>      
   			<div class="row">
   			<div class="col-md-10" style="margin-left: 200px">
            <h1>Request for leaves</h1>
            <br>
    	
            <form name="Employee_ID" id="leave">
               <div class="form-group row ">
                  <label for="name" class="col-md-2 col-form-label text-md-right">Employee_ID</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" name="employee_id"value="{{$user['employee_id']}}" readonly>
                  </div>
               </div>


               <div class="form-group row">
                  <label for="Leave type" class="col-md-2 col-form-label text-md-right">Leave type</label>
                  <div class="col-md-6">
                     <select name="leave_type" class="col-sm-12 form-control">
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Casual Leave">Casual Leave</option>
                            <option value="Earned Leave/PL">Earned Leave
                            </option>
                            <option value="Sectional/National Leave">Sectional/  National Leave</option>
                            <option value="Maternity Leave">Maternity Leave</option>
                            <option value="Paternity Leave">Paternity Leave</option>
                          </select>
                  </div>
               </div>

               <div class="form-group row">
                  <label for="Leave Date" class="col-md-2 col-form-label text-md-right">Leave Date</label>
                  <div class="col-md-3">
                  	 <label for="Leave Date">From</label>
                     <input type="text"  class="form-control leaveDate" name="from_date" id="from_date" autocomplete="off">
                  </div>
                   <div class="col-md-3">
                  	 <label for="Leave Date">To</label>
                     <input type="text"  class="form-control leaveDate" name="to_date" id="to_date" autocomplete="off">
                  </div>
               </div>

               <div class="form-group row">
                  <label for="No. of Leave taken" class="col-md-2 col-form-label text-md-right">No. of Days</label>
                  <div class="col-md-6">
                     <input type="text" class="form-control" name="total_days" id="total_days">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="No. of Leave taken" class="col-md-2 col-form-label text-md-right">Total leaves in year</label>
                  <div class="col-md-6">
                     <input type="text" class="form-control" name="total_leaves" value="24" readonly>
                  </div>
               </div> 


               <div class="form-group row">
                  <label for="Reason for leave" class="col-md-2 col-form-label text-md-right">Reason for leave</label>
                  
                  <div class="col-md-6">
                  <textarea rows="5" class="form-control" name="leave_reason"></textarea> 
                  </div>
               </div>               
               <div class="col-md-6 col-md-offset-4">

                <button type="submit" class="btn btn-primary"
                   style="margin-left: 00px" >Submit</button>
                   </div>
            </form>
            </div>
            <div class="modal-footer">
               <div class="col-md-6">
               </div>
            </div>

         </div>
      </div>
   </div>
   </div>
   </div>
   </div>   
@endsection
@section('myScript')
<script src="js/jQuery UI -1.11.0.js"></script>
<link rel="stylesheet" href="js/jQuery UI -1.12.1.css">
<script>
 $(document).ready(function(){

 $(function () {
    $(".leaveDate").datepicker({

        minDate: 0,
        dateFormat: 'dd-mm-yy'

    });
    });

   $("#to_date").on('change', function(e) {
                    // alert("success")
                     var fromDate = $('#from_date').val(),
                     toDate = $('#to_date').val(),
                     from, to, duration;
                     // alert(fromDate)
                     from = moment(fromDate, 'DD-MM-YYYY');
                     to = moment(toDate, 'DD-MM-YYYY');

                      /* using diff */
                     var duration = to.diff(from, 'days')+1
                     // alert(duration)
                     /* show the result */
                     $('#total_days').val(duration);
                   });


 $('#leave').validate({
   rules:{

     total_days:{
           required:true,
     },

     leave_reason:{
           required:true,
     },

     from_date:{
       required:true,
     },

     to_date:{
        required:true,

     }
   },
   messages: {
     total_days:"please add total days",
   },
   submitHandler:function(form){
     var formData=$('form').serialize();

     $.ajax({
       url:"{{url('leave_request')}}",
       method:"post",
       data:formData,

       success:function(res){
         if(res=="success"){
           // alert("success")
         window.location.href = "employee_dashboard";
         }
         else{
               $.each(res.errors, function(key, value){
               $('.alert-danger').show();
               $('.alert-danger').append('<p>'+value+'</p>');
               });
           // alert("fail")
         }
       }
     })
   }
 })
})

</script>

@endsection
