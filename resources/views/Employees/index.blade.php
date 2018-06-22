@extends('adminlte::page')

@section('title', 'List Employees')

@section('content_header')
    <h1>List Employees</h1>
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
          <th>First Name</th>
          <th>Last Name</th>
          <th>Company</th>
          <th>Phone</th>
          <th>Email</th>
          <th>ID</th>
        </tr>
      </thead>
      <tbody>
        @foreach($employees as $employee)
        <tr>
          <td>{{$employee['first_name']}}</td>
          <td>{{$employee['last_name']}}</td>
          @foreach($companies as $company)
            @if($employee->company_id === $company->company_id)
              <td>{{$company['name']}}</td>
            @endif
          @endforeach
          <td>{{$employee['phone']}}</td>
          <td>{{$employee['email']}}</td>
          <td>{{$employee['company_id']}}</td>

          <td align="right"><a href="{{action('Employee\EmployeeController@edit', $employee['employee_id'])}}" class="btn btn-warning">Edit</a></td>
          <td align="left">
            <form action="{{action('Employee\EmployeeController@destroy', $employee['employee_id'])}}" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $employees->links() !!}
  </div>
@stop
