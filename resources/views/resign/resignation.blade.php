@extends('layouts.master')
@section('content')

                            
   			<div class="container">
   			<div class="row">
   			<div class="col-md-10"  style="margin-left: 200px" >
            <h1 > Employee resignation</h1> 
            <br>
    	     <div class="alert alert-danger" style="display:none"></div>
          <form name="employee_id" id="resignForm">
               <div class="form-group row">
                
                  <label for="name" class="col-md-2 col-form-label text-md-right">Employee id</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" name="employee_id" value="{{Auth::user()->employee_id}}" readonly> 
                  </div>
               </div>

               <div class="form-group row">
                  <label for="reason" class="col-md-2 col-form-label text-md-right">Reason for Resignation</label>
                  <div class="col-md-6">
                     <textarea class="form-control" rows="8" name="reason"> 
                     </textarea> 
                  </div>
               </div>
               </div><br>
                <button type="submit" class="btn btn-primary" 
                       style="margin-left: 400px" >Submit</button>

            </form>
            </div>
        </div>
      </div>
     </div>
    </div>
   </div>
  </div>


  
   
@endsection

@section('myScript')
<script>
  $(document).ready(function(){
    $('#resignForm').validate({
      rules:{
        reason:{
          required:true,
          minlength: 10
        }
      },
      messages:{
        reason:{
          required:"please specify resignation reason",
          minlength:"reason should 10 characters long"
        }
      },

      submitHandler:function(form){
        var formData=$('form').serialize();

        $.ajax({
          url:"{{ url('resignationRequest') }}",

          method:"post",

          data:formData,

          success:function(res){

            if(res=="success"){

              alert("success")
              window.location.href="employee_dashboard"
            }
            else{
              // alert("fail")
              $.each(res.errors, function(key, value){
                        $('.alert-danger').show();
                        $('.alert-danger').append('<p>'+value+'</p>');
                      });
              // $('.alert-danger').show();
            }
          }
        })
      }
    })
  })
</script>
@endsection

