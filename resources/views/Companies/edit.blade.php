@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
  <h1>Edit Company - {{ $companies->name }}</h1><br/>
@stop

@section('content')
  <div class="container">
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
    @if (\Session::has('success_edit_company'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success_edit_company') }}</p>
      </div><br />
    @endif
    <form method="post" action="{{action('Company\CompanyController@update', $id)}}" enctype="multipart/form-data">
      @csrf
      <input name="_method" type="hidden" value="PATCH">
      <div class="row">
        <div class="form-group col-md-4">
          @if(file_exists( public_path().'/storage/images/avatar/'.$companies['logo'] ))
            <img src="/storage/images/avatar/{{ $companies->logo }}" style="width:100px; height:100px; float:left; border-radius:50%; margin-right:25px;">
          @else
            <img src="/storage/images/avatar/default.png" style="width:100px; height:100px; float:left; border-radius:50%; margin-right:25px;">
          @endif
        </div>
      </div>
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
          <label for="logo">Logo (min: 100x100):</label>
          <input type="file" name="select_file">
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