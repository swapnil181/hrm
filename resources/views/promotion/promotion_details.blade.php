@extends('layouts.master')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Promotion Details</h5>
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
                        <th>Employee id</th>
                        <th>Reaquest Description</th>
                        <th> Date</th>
                        <th>Status</th>
                        <th>Remarks</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $promotion)
                        <tr>
                            <td>{{$promotion['employee_id']}}</td>
                            <td>{{$promotion['request']}}</td>
                            <td>{{$promotion['created_at']}}</td>
                            <td>{{$promotion['status']}}</td>
                            <td>{{$promotion['comment']}}</td>
                            <td>          
                                <button class="btn btn-info" 
                                id="{{$promotion['_id']}}" 
                                onclick="approvePromotion(this.id,this.value)"
                                value="Approved">Approve
                                </button>

                                <button class="btn btn-danger" 
                                id="{{$promotion['_id']}}" 
                                onclick="approvePromotion(this.id,this.value)"
                                value="Rejected">Reject
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
        <input type="hidden" name="status" id="msg">
       <input type="submit" name="" id="btn"  value="Submit">
        </form>

      </div>
    </div>
  </div>
</div>        

    
@endsection
@section('myScript')
    
    <script>
        $(document).ready(function(){
            //alert("ok")
          
     $("#btn").on('click', function(){
         //alert($(this).val())
        
        $('#status').validate({
             
             rules:{
                comment:{
                    required:true,
                }
            },

            submitHandler:function(form) {

                var formData = $('form').serialize();
                 //alert(formData)
                $('#exampleModal').modal("hide");
                
                $.ajax({
                    url: "{{url('approvePromotion')}}",
                    method: 'post',
                    
                    data:formData,        
                    success:function(res){
                        if(res == "success") {
                            // alert("success")
                            location.reload();
                        }
                        else{
                            alert("fail")
                        }
                    }
                });
            }
        });
    })
    })   
      function approvePromotion(id, value) {

             // alert(id)
            //alert(value)
          $('#appId').val(id);
          $('#msg').val(value);  
         $('#exampleModal').modal("show");   
        } 
    </script>
 @endsection