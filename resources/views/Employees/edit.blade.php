@extends('adminlte::page')

@section('title', 'Edit Employee')

@section('content_header')
  <h1>Edit Employee - {{ $employee->first_name }} {{ $employee->last_name }}</h1><br/>
@stop

@section('content')
  <div class="container">
      {{-- Here is displayed an alert of the fields that needs to be filled. --}}
      @if (count($errors) > 0)
        <div class="alert alert-danger">
        Upload Validation Error<br><br>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        </div>
      @endif
      @if (\Session::has('success_edit_employee'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success_edit_employee') }}</p>
        </div><br />
      @endif
      <form method="post" action="{{action('Employee\EmployeeController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="form-group col-md-4">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
          </div>
        </div>
        @if($companies != null)
        <div class="row">
          <div class="form-group col-md-4">
            <label for="company_id">Company:</label>
            <select name="company_id" class="form-control">
            {{-- List all companies from the Company Database --}}
              @foreach($companies as $company)
                @if($employee->company_id === $company->company_id)
                  <option selected value="{{$company->company_id}}">{{$company->name}}</option>
                @else
                <option value="{{$company->company_id}}">{{$company->name}}</option>
                @endif
              @endforeach
            </select>
          </div>
        </div>
        @endif
        <div class="row">
          <div class="form-group col-md-4">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" value="{{$employee->email}}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-12" style="margin-top:10px">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
    </div>
@stop