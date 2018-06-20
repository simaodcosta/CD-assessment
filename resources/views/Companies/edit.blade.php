@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
  <h1>Edit Company</h1><br/>
@stop

@section('content')
  <div class="container">
      <form method="post" action="{{action('Company\CompanyController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$companies->name}}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="email">Email:</label>
            <input type="text" class="form-control" name="email" value="{{$companies->email}}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" name="phone" value="{{$companies->phone}}">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-4">
            <label for="logo">Logo:</label>
            <input type="text" class="form-control" name="logo" value="{{$companies->logo}}">
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