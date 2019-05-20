@extends('layouts.master')

@section('content')

<div class="container">

    @if($user=Auth::user())
    <h1>Welcome {{$user['name']}}</h1>
    @endif

@if(Auth::user()->role == 'Employee') 
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#complaints">Complaints</button>

  @if ($errors->any())
    <div class="alert alert-info">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

<div class="modal fade" id="complaints" role="dialog">
  
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Complaint Form</h4>
      </div>
        
  <div class="modal-body">
  
    <form name="my-form"  id="complaint">      
      <div class="form-group row">
          <label for="text" class="col-md-4 col-form-label text-md-right">Complainer</label>
        <div class="col-md-6">
            <input type="text" id="date" class="form-control" name="complainer" value={{Auth::user()->employee_id}} readonly>
        </div>
      </div>
       <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

            <div class="col-md-6">
              <select name="role" id="complaint" 
              class="col-sm-12" style="height:35px">
                
                <option value="">select</option>
                
                <option value="Admin"  onclick="dropdown(this.value)" 
                >Admin</option>

                <option value="Employee">Employee</option> 
              </select>
            </div>
        </div>
        
        <div class="form-group row" id="selectName" hidden>
          
          <label class="col-md-4 col-form-label text-md-right" id="label">
          Complaint against</label>

          <div class="col-md-6">
            <select name="complaint_against" id="complaint" 
            class="col-sm-12" style="height:35px" >    
            </select>
          </div>
        </div>


        <div class="form-group row">
            <label for="reason" class="col-md-4 col-form-label text-md-right">Specify Reason</label>
            <div class="col-md-6">
              <textarea rows="3" type="text" id="reason" class="form-control" name="reason"></textarea>
           </div>
        </div>

       <div class="modal-footer">
        <div class="col-md-8">
          <button  class="btn btn-primary">Submit</button>
          <button type="submit" class="btn btn-danger " 
          data-dismiss="modal">Close</button>
        </div>
        </div>
      </form>       
      </div>
    </div>
    </div>
  </div>
@endif
</div> 

         <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Complaints</h5>
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
                    <table class="table table-striped table-bordered table-hover dataTables-example" id="complaintTable">
                    <thead>
                    <tr>
                        <th>Complainer</th>
                        <th>Complaint Against</th>
                        <th>Complaint</th>
                        <th>Date</th>
                        @if($user['role']=='Employee')
                        <th>Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody id="data">
                      @foreach($data as $complaint)
                      
                      <tr>
                          <td>{{$complaint['complainer']}}</td>
                          <td>{{$complaint['complaint_against']}}/{{$complaint['role']}}</td>
                          <td>{{$complaint['reason']}}</td>
                          <td>{{$complaint['created_at']}}</td>
                          @if($user['role']=='Employee')
                          <td>
                            <button class="btn btn-danger delete"
                            id="{{$complaint['_id']}}">Delete</button>

                          </td>
                          @endif
                      </tr>
                      
                      @endforeach
                    </tbody>
                    <tbody>          
                    </tbody>
                
                  </table>
            </div>              
@endsection

@section('myScript') 
<script>

$('#complaint').validate({
  rules:{
    reason:{
      required:true,
      minlength:10
    },
    role:{
      required:true
    }
  },
  submitHandler:function(form){
    var formdata=$('form').serialize();

    $.ajax({
      url:"{{ url('registerComplaint') }}",
      method:"post",
      data:formdata,

      success:function(res){
        if(res == "success"){
          // alert("success")
          $('#complaints').modal('hide')

        }
        else{
          alert("fail")
        }
      }
    })
  }
})
$('#complaint').change(function(){
  // alert('okk')
  $('#date').placeholder= Date();
  var value=$('#complaint option:selected').attr('value')
  // alert(value)
        $.ajax({

            url: "{{url('getEmployee')}}",
            method: 'post', 
            data:" value="+value,

            success:function(res){
              // alert(res)
                $('select[name="complaint_against"]').empty();
                $.each(res,function(key,value){
                // alert(value.name)

                $('#selectName').show();
                $('#label').text(value.role);
                $('select[name="complaint_against"]').show().append('<option value="'+ value.name +'">'+ value.name +'</option>').find('[value="{{$user['name']}}"]').remove();
                
                });
                if(res=="fail"){
                alert("fail")
                }
               }
            });
        });
            $('#complaintTable').on("click" ,'.delete', function(){
            var id=this.id;
             // alert(id)
            $.ajax({
              url:"{{ url('deleteComplaint') }}/"+id,
              method:"get",
              success:function(res){
                if(res!="fail"){
                  $('#data').empty();
                  $.each(res, function(key, value){
                    if(res=="fail"){
                    alert("fail");
                }
                else{
                  var data='<tr><td>'+value.complainer+'</td><td>'+value.complaint_against+'</td><td>'+value.reason+'</td><td>'+value.created_at+'</td><td><button class="btn btn-danger delete"id='+value._id+'">Delete</button></td></tr>';
                  $('#data').append(data);  

                }
                  });
                  // alert("success")
                  // location.reload()
                }
                else{
                  alert("Fail")
                }
              }
            })
          })

    

</script>

 @endsection 
