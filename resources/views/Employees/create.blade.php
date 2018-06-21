@extends('adminlte::page')

@section('title', 'Create Employee')

@section('content_header')
    <h1>Create Employees</h1>
@stop

@section('content')
  <div class="container">
      @if($companies != null)
        <form method="post" action="{{url('employees')}}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="form-group col-md-4">
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="company_id">Company:</label>
              <select name="company_id" class="form-control">
                @foreach($companies as $company)
                  <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="phone">Phone Number:</label>
              <input type="text" class="form-control" name="phone">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4" style="margin-top:10px">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
          </div>
        </form>
      @else
        <h2>You need to add a company first !</h2>
      @endif
    </div>
@stop