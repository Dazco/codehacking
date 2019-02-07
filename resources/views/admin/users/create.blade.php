@extends('layouts.admin')

@section('content')
    <h1>Create Users</h1>
    @include('includes.form_error')
    {!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store','files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id','Role:') !!}
            {!! Form::select('role_id',['choose'=>'Choose Options'] + $roles,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active','Status') !!}
            {!! Form::select('is_active',['1'=>'Active','0'=>'Not Active'],'0',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirmation','Confirm Password:') !!}
            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('profile','Profile Picture (optional):') !!}
            {!! Form::file('profile',['class'=>'form-control-file']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection