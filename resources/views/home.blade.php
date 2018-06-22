@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard | Basic Mini CRM</h1>
@stop

@section('content')
    <div style="padding-top: 60px">
        <div class="col-md-1"></div>
        <div class="col-md-5">
            <h2>Main Features:</h2>

            <ul>
                <li>Create, read, update and delete companies and employees</li>
                <li>Public logo for each company</li>
                <li>Phasellus iaculis neque</li>
                <li>Purus sodales ultricies</li>
                <li>Vestibulum laoreet porttitor sem</li>
                <li>Ac tristique libero volutpat at</li>

            </ul>
        </div>
        <div class="col-md-6">
            <img src="/storage/images/features.png" class="img-responsive center-block" alt="Features" style="width:60%">
        </div>
    </div>
@stop