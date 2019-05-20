@extends('layouts.master')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Leave Details</h5>
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
                        <th width="250px">Reason for Leave</th>
                        <th width="60px">Leave Date</th>
                        <th width= "50px">Leave Type</th>
                        <th width= "60px"> No. of days</th>
                        <th width= "60px">Total Leaves taken</th>
                        <th width= "60px">Available Leaves</th>
                        <th>Comment</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($leaveData as $data) 
                        <tr class="gradeX">
                            <td>{{$data['leave_reason']}}</td>
                            <td>{{$data['from_date']}}</td>
                            <td>{{$data['leave_type']}}</td>
                            <td>{{$data['total_days']}}</td>
                            <td>{{$data['totalLeavesTaken']}}</td>
                            <td>{{$data['availableLeaves']}}</td>
                            <td>{{$data['comment']}}</td>
                            <td>{{$data['status']}}</td>
                        </tr>  
                        @endforeach
                        </tbody>
                    </table>
                    </div>

@endsection
@section('myScript')

   <!-- <script>
   $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        }); -->

    </script>

@endsection

