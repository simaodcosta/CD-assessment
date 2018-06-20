@extends('adminlte::page')

@section('title', 'Create Company')

@section('content_header')
  <h1>Create Company</h1><br/>
@stop

@section('content')
  <div class="container">
      <form method="post" action="{{url('companies')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email">
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
            <label for="logo">Logo:</label>
            <input type="text" class="form-control" name="logo">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4" style="margin-top:10px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
@stop