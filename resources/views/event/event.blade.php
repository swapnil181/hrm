@extends('layouts.master')
@section('content')
                            
   			<div class="container">
   			<div class="row">
   			<div class="col-md-10"  style="margin-left: 200px" >
            <h1 >  Event Request</h1> 
            <br>
    	  @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

          <form name="Event_Name" id="event">
               <div class="form-group row">
                <label for="event changes" class="col-md-2 col-form-label text-md-right">Event Request</label>
                  <div class="col-md-6">
                    <input type="text"  class="form-control" name="event_request"
                     value="{{Auth::user()->name}}" readonly>
                 </div>
              </div>
               <div class="form-group row">
                
                  <label for="name" class="col-md-2 col-form-label text-md-right">Event Name</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" name="event_Name">
                  </div>
               </div>

               <div class="form-group row">
                  <label for="event Date" class="col-md-2 col-form-label text-md-right">Event Date</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" id="eventDate" name="event_date" autocomplete="off"> 
                  </div>
               </div>

               <div class="form-group row">
                  <label for="event discription" class="col-md-2 col-form-label text-md-right">Event Description</label>
                  <div class="col-md-6">
                     <textarea rows="5" cols="20" class="form-control" name="event_discription"></textarea>  
                  </div>
               </div>

               </div><br>
                       <button class="btn btn-primary"
                        style="margin-left: 550px" >Submit</button>

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
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
$(document).ready(function(){
 
  $(function () {
     $("#eventDate").datepicker({
         minDate: 0
     });
  });

  $('#event').validate({
    rules:{
      
      event_discription:{
            required:true,
            maxlength:300,

      },
      event_Name:{
        required:true,
        maxlength:30,
      },
      event_date:{
        required:true,
        date:true
      }
    },
    messages:{
      event_Name:{
        maxlength:"Event name should  be only 30 characters long",
      },
      event_discription:{
        maxlength:"Event Description should be only 300 characters long"
      }
    },

    submitHandler:function(form){
      var formData=$('form').serialize();

      $.ajax({
        url:"{{ url('createEvent') }}",
        method:"post",
        data:formData,

        success:function(res){
        if(res=="Success"){
          swal({
                title: "event created Successfully!",
                type: "success",
              });
          window.location.href="employee_dashboard";
        }    
        else{
          alert("fail")
        }
        }
      })
    }

  });

  
})
</script>
@endsection

