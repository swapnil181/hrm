@extends('layouts.master')
@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Promotion Status</h5>
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

    
@endsection
