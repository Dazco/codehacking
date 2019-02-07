@extends('layouts.admin')

@section('content')
    <h1>Edit Users</h1>
    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}
    <div class="col-sm-3">
        <img src="{{$user->photo?$user->photo->path:'/images/default-profile-image.png'}}" alt="Profile picture" class="img-responsive img-rounded">
        <div class="form-group">
            {!! Form::label('profile','Change Picture:') !!}
            {!! Form::file('profile',['class'=>'form-control-file']) !!}
        </div>
    </div>
    <div class="col-sm-9">
            @include('includes.form_error')
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
                {!! Form::select('is_active',['1'=>'Active','0'=>'Not Active'],null,['class'=>'form-control']) !!}
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
                {!! Form::submit('Update User',['class'=>'btn btn-primary col-sm-5']) !!}
            </div>
        {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User',['class'=>'btn btn-danger col-sm-5 pull-right']) !!}
            </div>
        {!! Form::close() !!}
    </div>
@endsection