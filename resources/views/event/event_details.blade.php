@extends('layouts.master')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Event Details</h5>
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
                        <th>Event Name</th>
                        <th>Event Description</th>
                        <th>Event Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $event)
                        <tr>
                            <td>{{$event['event_Name']}}</td>
                            <td>{{$event['event_discription']}}</td>
                            <td>{{$event['event_date']}}</td>
                            <td>{{$event['status']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                   </table>
                   {{$data->links()}}
            </div>
    
@endsection
