@extends('layouts.master')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Employee Leave Request</h5>
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
                        <th>Employee Id</th>
                        <th>Reason For Leave</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Number of Days</th>
                        <th>Total leaves taken</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>    
                           @foreach($leaveData as $data) 
                        <tr class="gradeX">
                            <td>{{$data['employee_id']}}</td>
                            <td>{{$data['leave_reason']}}</td>
                            <td>{{$data['leave_type']}}</td>
                            <td>{{$data['from_date']}}</td>
                            <td>{{$data['to_date']}}</td>
                            <td width="100px">{{$data['total_days']}}</td>
                            <td width="100px">{{$data['totalLeavesTaken']}}</td>
                            <td>{{$data['status']}}</td>
                            <td>
                         <button class="btn btn-primary" id="{{$data['_id']}}" 
                                  onclick="approveleave(this.id,this.value)"
                                  value="Approved">Approve
                         </button>
                             
                         <button class="btn btn-danger" id="{{$data['_id']}}" 
                                 onclick="approveleave(this.id,this.value)" 
                                 value="Rejected">Reject
                        </button> 
                        </tr>  
                        @endforeach  
                    </tbody>
                     </table>
            </div>
<!-- Modal -->
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
       <input type="submit" name="" id="btn"  value="Submit" class="btn btn-success">
        </form>

      </div>
    </div>
  </div>
</div>


@endsection

 @section('myScript')
        

 <script type="text/javascript">

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
                    url: "{{url('approveLeave')}}",
                    method: 'post',
                    
                    data:formData,
                    
                    success:function(res){
                        if(res == "Success") {
                            // alert("success")
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
// });

function approveleave(id,value){    
             // alert(id)
    //alert(value)    
     $('#msg').val(value)
     $('#appId').val(id)
     // $('#msg').val(value)
    
   $('#exampleModal').modal("show")
}
</script>
@endsection
              
               