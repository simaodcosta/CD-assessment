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
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Logo</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
        @foreach($companies as $company)
        <tr>
          <td>{{$company['id']}}</td>
          <td>{{$company['name']}}</td>
          <td>{{$company['email']}}</td>
          <td>{{$company['logo']}}</td>
          <td>{{$company['phone']}}</td>

          <td align="right"><a href="{{action('Company\CompanyController@edit', $company['id'])}}" class="btn btn-warning">Edit</a></td>
          <td align="left">
            <form action="{{action('Company\CompanyController@destroy', $company['id'])}}" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@stop
