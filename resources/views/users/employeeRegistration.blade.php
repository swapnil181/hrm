@extends('layouts.master')

@section('content')

<div class="container">
  <div class="container">

    @if($user=Auth::user())
    <!--  <h1>Welcome {{$user['name']}}</h1> -->
    @endif

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Reg_Modal1">Registration</button>

  <!-- Modal -->

<div class="modal fade" id="Reg_Modal1" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
  <div class="modal-content">
        
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Employee Regestration Form</h4>
      </div>
    
  <div class="alert alert-danger" hidden></div>    
  <!--model body-->
  <div class="modal-body">
  
    <form name="my-form" id="register">
          
      <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">Employee Name</label>
          <div class="col-md-6">
              <input type="text" id="name" class="form-control" name="name">
          </div>
      </div>
          

      <div class="form-group row">
          <label for="phone_number" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
           <div class="col-md-6">
          <input type="text" id="number" class="form-control" name="mobile">
        </div>
      </div>

      <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
          <div class="col-md-6">
            <input type="text" id="email" class="form-control" name="email">
         </div>
      </div>

      <div class="form-group row">
          <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
        <div class="col-md-6">
            <input type="text" id="dob" class="form-control" name="dob" autocomplete="off" readonly='true'>
        </div>
      </div>

    <div class="form-group row">
        <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
       <div class="col-md-6">
        <select name="gender" class="form-control">
        <option value="male">Male</option>
        <option value="female">Female</option>
       </select>
      </div>
  </div>

  <div class="form-group row">
        <label for="jdate" class="col-md-4 col-form-label text-md-right">Joining Date</label>
      <div class="col-md-6">
        <input type="date" id="jdate" class="form-control" name="joining_date">
      </div>
    </div>

  <div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
    <div class="col-md-6">
      <select name="role" class="col-sm-12" style="height:32px">
        <option value="EscalationManager">Escalation Manager</option>
        <option value="Admin">Admin</option>
        <option value="Employee">Employee</option>
      </select>
    </div>
  </div>

  <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
          <div class="col-md-6">
            <input type="password" id="password" class="form-control" name="password">
            </div><br>
            <div class="col-md-6">
            <span id="passwordMsg"></span> 
            </div>
  </div>

  <div class="modal-footer">
    <div class="col-md-8">
    <button type="submit" class="btn btn-primary" onclick="validatePassword()">Register</button>
    <button type="submit" class="btn btn-danger " data-dismiss="modal">Close</button>
    </div>
  </div>
</form>                        
</div>
</div>
</div>
</div>
</div>  

   <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Employee Details</h5>
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
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="tbl">
                    <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>Employee Name</th>
                        <th>Email</th>
                        <th>Mobile NO</th>
                        <th>DOB</th>
                        <th>Joining Date</th> 
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="data">
                @foreach($employeedata as $data)
                    <tr class="gradeX">
                        <td>{{$data['employee_id']}}</td>
                        <td>{{$data['name']}}</td>
                        <td>{{$data['email']}}</td>
                        <td>{{$data['mobile']}}</td>
                        <td>{{$data['dob']}}</td>
                        <td>{{$data['joining_date']}}</td>
                        <td>{{$data['role']}}</td>
                        <td width="200px">
                        <a href="{{url('edit')}}/{{$data['employee_id']}}"
                         class="btn btn-success">Edit</a>
                        <a href="{{url('view')}}/{{$data['employee_id']}}" 
                        class="btn btn-info">View</a>
                        
                        <button class="btn btn-danger delete" id="{{$data['employee_id']}}">Delete</button>
                        </td>
                    </tr>

                @endforeach
       </tbody>

</table>
{{ $employeedata->links() }}
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

<script>
  function validatePassword(){
      var password=$('#password').val();
      // alert(password)
      var reg=/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
      if(reg.test(password)){
      // alert("true")
      return true;
      }
      else{
      // alert("truesf")
      $('#password').css("border","2px solid red");
      $('#passwordMsg').html("<p>Password should contain one uppercase char, one number, one special character and length 8 chars</p>")
      return false;
      }
    };
    
  $(document).ready(function(){
        
    $('#tbl').on("click",'.delete', function(){
          var id=this.id;
          // alert(id)  
          swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true
        },
          function(isConfirm){
           if (isConfirm) {
            $.ajax({
            url:"{{'delete'}}/"+id,
            method:"get",

            success:function (res){
              if(res!="fail"){
                // window.location = "admin_dashboard";
              $("#data").empty();
              $.each(res,function(key, value){
                  if(res=="fail"){
                    alert("fail");
                }
            else{
                var data='<tr><td>'+value.employee_id+'</td><td>'+value.name+'</td><td>'+value.email+'</td><td>'+value.mobile+'</td><td>'+value.dob+'</td><td>'+value.joining_date+'</td><td>'+value.role+'</td><td><a href="{{url('edit')}}/value.employee_id">Edit</a>/<a href="{{url('view')}}/value.employee_id">View</a>/<button class="btn btn-danger delete" id="'+value.employee_id+'">Delete</button></td></tr>';
                // alert(data)  
                  $('#data').append(data);
                }
              });
              // alert("ok")
              }
            }
          })
       }
     })
})
  
  $("#register").validate({
         
          rules: {
              joining_date: {
                 required: true,
             },   

             email: {
                 required: true,
                 email: true
             },
             password: {
                 required: true,
             },
             dob:{
                required: $(function () {
                          $('#dob').datepicker({
                          changeMonth: true,
                          changeYear: true,
                          yearRange: '1950:2012',
                          dateFormat: "yy-mm-dd",
                          maxDate: new Date('2002-12-31')
                        });
                  }),

             },
             mobile:{
               required:true,
              rangelength: [10, 10],
             },
             
             name:{
               required:$('#name').keyup(function() {
                var first = jQuery('#name').val();

                first = first.charAt(0).toUpperCase() + first.slice(1);
               jQuery('#name').val(first);
              })
             },

         },
        messages:{
          name:{
            required:"name is required",
            maxlength:"name lenght should not be greater than 10"
          },
          dob:{
            required:"date of birth should be before 2002"
          }
        },

         submitHandler:function(form) {

          var formData = $('form').serialize();
          
          // alert(formData)
          $.ajax({
            url: "{{url('insert')}}",
            method: 'post',
            
            data:formData,
            
            success:function(res){
                if(res == "Success") {
                   window.location.href = "admin_dashboard"; 
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

          });

</script>  
 @endsection
