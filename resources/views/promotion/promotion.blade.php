@extends('layouts.master')
@section('content')

                            
   			<div class="container">
   			<div class="row">
   			<div class="col-md-10"  style="margin-left: 200px" >
            <h1 > Employee Promotion</h1> 
            <br>

          <form name="employee_id" id="promotionForm">
                     
        @if($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
         @endif
               <div class="form-group row">
                
                  <label for="name" class="col-md-2 col-form-label text-md-right">Employee id</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" name="employee_id"
                     value="{{Auth::user()->employee_id}}" readonly>
                  </div>
               </div>

               <div class="form-group row">
                  <label for="request" class="col-md-2 col-form-label text-md-right">Description of Request</label>
                  <div class="col-md-6">
                     <textarea class="form-control" rows="8" name="request">
                      </textarea>
     
                  </div>
               </div>



               </div><br>
                       <button type="submit" class="btn btn-primary" style="margin-left: 400px" >Submit</button>

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
<script type="text/javascript">
  $(document).ready(function(){

    $('#promotionForm').validate({
      rules:{
        request:{
          required:true,
        }
      },
      messages:{
        request:"Please specify reason for promotion"
      },
    

    submitHandler:function(form){
      var formData=$('form').serialize();

      $.ajax({
        url:"{{url('promotionRequest')}}",
        method:"post",
        data:formData,

        success:function(res){
          if(res=="success"){
            alert("success")
            window.location.href = "employee_dashboard";
                      
          }
          else{
            alert("fail")
          }
        }
      })
    }
    })    
  })
</script>

@endsection

