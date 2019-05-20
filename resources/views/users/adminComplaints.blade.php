
@extends('layouts.master')

@section('content')

<div class="container">
  <div class="container">

    @if($user=Auth::user())
    <h1>Welcome {{$user['name']}}</h1>
  @endif
@if(Auth::user()->role == 'Employee') 
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#complaints">Complaints</button>
@endif

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
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Complainer</th>
                        <th>Complaint Against</th>
                        <th>Complaint</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $complaint)
                      <tr>
                          <td>{{$complaint['complainer']}}</td>
                          <td>{{$complaint['complaint_against']}}</td>
                          <td>{{$complaint['reason']}}</td>
                          <td>{{$complaint['created_at']}}</td>
                          <td><button class="btn btn-danger"
                           id="{{$complaint['_id']}}" onclick="replay(this.id)">Replay</button></td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tbody>          
                    </tbody>
                
                  </table>
             {{$data->links()}}     
            </div>
   <div class="modal" id="exampleModal"  role="dialog"
 aria-labelledby="exampleModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Message to Employee</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
        <form id="status">
        <input type="hidden" name="id"  id="appId">
        
       <textarea  cols="70" rows="5" name="comment"></textarea> 
        
       <input type="submit" class="btn btn-success" name="" id="btn"  value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>
                                    
@endsection
@section('myScript') 
<script>
 $(document).ready(function(){
     //$("#btn").on('click', function(){
        // alert($(this).val())
        
        $('#status').validate({
             
             rules:{
                comment:{
                    required:true,
                }
            },

            submitHandler:function(form) {

                var formData = $('form').serialize();
                 // alert(formData)
                $('#exampleModal').modal("hide");
                
                $.ajax({
                    url: "{{url('replayComplaint')}}",
                    method: 'post',
                    
                    data:formData,
                    
                    success:function(res){  
                        if(res == "success") {
                            alert("success")
                            location.reload()
                        }

                        else{
                            alert("fail")
                        }
                    }
                });
            }
        });
    }) 
  function replay(id){
    // alert(id)
    $('#appId').val(id);
    

    $('#exampleModal').modal("show")
  }
</script>
 @endsection 
