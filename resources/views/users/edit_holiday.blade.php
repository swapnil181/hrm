@extends('layouts.master')
@section('content')
	<div class="container">
  <div class="container">

  <!-- Trigger the modal with a button -->

        
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Holiday Details</h4>
        </div>

        <div class="modal-body">
  
      <form name="my-form" action="{{url('updateHoliday')}}" method="post"
       id="register">
          
          <div class="form-group row">
            <label for="holiday" class="col-md-4 col-form-label text-md-right">Date</label>
            <div class="col-md-6">
            <input type="date" id="holiday" class="form-control" name="holiday"
              value="{{$holiday['holiday']}}">
            </div>
            <div class="col-md-6">
              <input type="hidden" id="id" class="form-control" name="employee_id" value="{{$holiday['_id']}}">
            </div>
          </div>

            <div class="form-group row">
              <label for="holiday_title" class="col-md-4 col-form-label text-md-right">Holiday Title</label>
              <div class="col-md-6">
                <input type="text" id="holiday_title" class="form-control" name="holiday_title" value="{{$holiday['holiday_title']}}">
              </div>
            </div>

            <div class="form-group row">
                  <label for="holiday_description" class="col-md-4 col-form-label text-md-right">Holiday Description</label>
                <div class="col-md-6">
                  <textarea  id="holiday_description" rows="3" class="form-control" name="holiday_description">
                  {{$holiday['holiday_description']}}</textarea>
               </div>
            </div> 
            
            <div class="modal-footer">
                <div class="col-md-8">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
          </form>          
                  </div>
                </div>
              </div>
@endsection

@section('myscript')

@endsection