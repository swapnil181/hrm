@extends('layouts.master')
@section('content')
	<div class="container">
    @if($user=Auth::user())
    <h1>Welcome {{$user['name']}}</h1>
  @endif
<form name="my-form" id="register">
           <div class="form-group row">
           {{--  <label for="name" class="col-md-4 col-form-label text-md-right">Employee Id</label> --}}
            <div class="col-md-6">
              <input type="hidden" id="id" class="form-control" name="employee_id" value="{{$data->employee_id}}">
            </div>
          </div>

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Employee Name</label>
            <div class="col-md-6">
              <input type="text" id="name" class="form-control" name="name" value="{{$data->name}}" readonly>
            </div>
          </div>

            <div class="form-group row">
              <label for="phone_number" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
              <div class="col-md-6">
                <input type="text" id="number" class="form-control" name="mobile" value="{{$data->mobile}}" readonly>
              </div>
            </div>

            <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                <div class="col-md-6">
                  <input type="email" id="email" class="form-control" name="email" value="{{$data->email}}" readonly>
               </div>
            </div>

              <div class="form-group row">
                  <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                <div class="col-md-6">
                    <input type="date" id="dob" class="form-control" name="dob" value="{{$data->dob}}" readonly>
                </div>
              </div>

                <div class="form-group row">
                    <label for="jdate" class="col-md-4 col-form-label text-md-right">Joining Date</label>
                  <div class="col-md-6">
                    <input type="date" id="jdate" class="form-control" name="joining_date" value="{{$data->joining_date}}" readonly>
                  </div>
                </div>
<div class=" form-group row">
        <label class="col-md-4">Role</label>
        <div class="col-md-6">
        <select name="role" class="form-control" disabled="true">
            
        @if($data['role']=="EscalationManager")
        <option value="EscalationManager" selected="select">EscalationManager</option>
        @else
        <option value="EscalationManager">Escalation Manager</option>
        @endif

        @if($data['role']=="Admin")
        <option value="Admin" selected="select">Admin</option>
        @else
        <option value="Admin">Admin</option>
        @endif

        @if($data['role']=="Employee")
        <option value="Employee" selected="select" >Employee</option>
        @else
        <option value="Employee">Employee</option>
        @endif
      </select>  
    </div>
                      <!-- <div class="form-group row">
                        <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
                        <div class="col-md-6">
                          <select name="role" class="col-sm-12 form-control">
                            <option value="EscalationManager">EscalationManager</option>
                            <option value="Admin">Admin</option>
                            <option value="Employee">Employee</option>
                          </select>
                        </div>
                      </div>
                  <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                          <input type="password" id="password" class="form-control" name="password" value="{{$data->password}}">
                          </div>
                        </div> -->
      
                    </div>
                    <div class="modal-footer">
                      <div class="col-md-8">
                {{-- <button type="submit" class="btn btn-primary">Update</button> --}}
      </form>          
</div>
@endsection

@section('myscript')

@endsection