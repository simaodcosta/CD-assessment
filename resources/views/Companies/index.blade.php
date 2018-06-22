@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>List Companies</h1>
@stop

@section('content')
  <div class="container">
      <br />
      @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br />
      @endif
      <table class="table table-striped">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>ID</th>
        </tr>
      </thead>
      <tbody>
        @foreach($companies as $company)
        <tr>
          @if(file_exists( public_path().'/storage/images/avatar/'.$company['logo'] ))
            <td>
              <img src="/storage/images/avatar/{{ $company->logo }}" class="center-block" style="width:25px; height:25px; border-radius:80%;">
            </td>
          @else
            <td>
              <img src="/storage/images/avatar/default.png" class="center-block" style="width:25px; height:25px;border-radius:80%;">
            </td>
          @endif
          <td>{{$company['name']}}</td>
          <td>{{$company['email']}}</td>
          <td>{{$company['phone']}}</td>
          <td>{{$company['company_id']}}</td>

          <td align="right">
            <a href="{{action('Company\CompanyController@edit', $company['company_id'])}}" class="btn btn-warning">Edit</a>
          </td>
          <td align="left">
            <form action="{{action('Company\CompanyController@destroy', $company['company_id'])}}" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $companies->links() !!}
  </div>
@stop
