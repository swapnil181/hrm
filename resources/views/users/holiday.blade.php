@extends('layouts.master')

@section('content')

<div class="container">
  <div class="container">

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Holiday">Add Holiday</button>
  
  <div class="modal fade" id="Holiday" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Holiday Details</h4>
        </div>
          <div class="alert alert-danger" style="display: none">
           </div>
        
        <div class="modal-body">
  
      <form name="my-form" id="holidayForm">
          
          <div class="form-group row">
            <label for="holiday" class="col-md-4 col-form-label text-md-right">Date</label>
            <div class="col-md-6">
            <input type="text" id="holiday" class="form-control" name="holiday">
            </div>
          </div>

            <div class="form-group row">
              <label for="holiday_title" class="col-md-4 col-form-label text-md-right">Holiday Title</label>
              <div class="col-md-6">
                <input type="text" id="holiday_title" class="form-control" name="holiday_title">
              </div>
            </div>

            <div class="form-group row">
                  <label for="holiday_description" class="col-md-4 col-form-label text-md-right">Holiday Description</label>
                <div class="col-md-6">
                  <textarea  id="holiday_description" rows="3" class="form-control" name="holiday_description"></textarea>
               </div>
            </div> 
            
            <div class="modal-footer">
                <div class="col-md-8">
                <button class="btn btn-primary">Submit</button>
                </div>
              </div>
          </form>          
                  </div>
                </div>
              </div>
            </div>
          
        
        <br><br>
   <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Holiday Details</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                  <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Holiday Name</th>
                        <th>Holiday Description</th>
                        <th>Holiday Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="data">
                      @foreach($holiday as $value)
                      
                      <tr>
                        <td>{{$value['holiday_title']}}</td>
                        <td width="400px">{{$value['holiday_description']}}</td>
                        <td>{{$value['holiday']}}</td>
                        <td><a href="editHoliday?id={{$value['_id']}}" class="btn btn-primary">Edit</a>

                          <button class="btn btn-info delete" id="{{$value['_id']}}">Delete</button>
                        
                      </tr>
                      @endforeach
                   
                    </tbody>
                  </table>
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
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css">

<script type="text/javascript">
@if (count($errors) > 0)
    $('#Holiday').modal('show');
@endif

$(document).ready(function(){

$('#holidayForm').validate({
    rules:{
      holiday_title:{
        required:true,
        maxlength:30
      },
      holiday_description:{
        required:true,
        maxlength:200
      },
      holiday:{
        required: $(function () {
                          $('#holiday').datepicker({
                          changeMonth: true,
                          changeYear: true,
                          dateFormat: "yy-mm-dd",
                          minDate: +1
                        })
      })
    },
},
    submitHandler:function(form){
      var formData=$('form').serialize();

      $.ajax({
        url:"{{url('createHoliday')}}",
        method:"post",
        data:formData,

        success:function(res){
          if(res=="success"){
            // alert("Success")
            location.reload();
            // $('#Holiday').modal('hide')
            // location.reload();
            // window.location().reload()
          }
          else if(res=="fail"){
            alert("fail")
          }
          else{
              $.each(res.errors, function(key, value){
              $('.alert-danger').show();
              $('.alert-danger').append('<p>'+value+'</p>');
            })
          }
        }
      })
    }
})

})

$('.delete').on("click", function(){
  var id=this.id;
  // alert(id)

  $.ajax({
    url:"{{ url('deleteHoliday') }}/"+id,
    method:"get",

    success:function(res){
      if(res!="fail"){
       $('#data').empty();
       $.each(res,function(key,value){
        if(res=="fail"){
          alert("fail");
        }
        else{
          var data='<tr><td>'+value.holiday_title+'</td><td>'+value.holiday_description+'</td><td>'+value.holiday+'</td><td><a href="{{url('editHoliday')}}/value.holiday" class="btn btn-primary">Edit</a><button class="btn btn-info delete" id=" '+value._id+'">Delete</button></tr>';
          $("#data").append(data);
        }
       })
      }
      else{
        alert("fail")
      }
    }
  })
})
</script>

 @endsection


    
