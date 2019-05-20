@extends('layouts.master')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Employee Event Request</h5>
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
                        <th>Event Request by</th>
                        <th>Event Title</th>
                        <th>Event Description</th>
                        <th>Event Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>    
                        @foreach($event as $data)
                        <tr class="gradeX">
                            <td>{{$data['event_request']}}</td>
                            <td>{{$data['event_Name']}}</td>
                            <td width="300px">{{$data['event_discription']}}</td>
                            <td>{{$data['event_date']}}</td>
                            <td>{{$data['status']}}</td>
                            <td>
                         <button class="btn btn-primary" id="{{$data['_id']}}" 
                              onclick="approveevent(this.id,this.value)"
                              value="Approved">Approve</button>
                             
                         <button class="btn btn-danger"  id="{{$data['_id']}}" 
                             onclick="approveevent(this.id,this.value)"
                             value="Rejected">Reject</button> 
                        </tr>  
                      @endforeach
                    </tbody>
                
                    </table>
            </div>
@endsection

@section('myScript')
        
<script type="text/javascript"> 

function approveevent(id,value){    
        // alert(id)
           // alert(value)
        $.ajax({

            url: "{{url('approveEvent')}}",
            method: 'post', 
            data:"id="+id +" & value="+value,
            success:function(res){
           
            if(res == "Success") {
                // alert("success")
            window.location.href = "event_request";    
            }

            else{
                alert("fail")
            }
            }
        });
    };  

</script> 

    
@endsection
              
               