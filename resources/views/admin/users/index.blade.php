@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    @if(Session::has('alert-success'))
        <div class="alert alert-success"><p><strong>{{Session::get('alert-success')}}</strong></p></div>
    @elseif(Session::has('alert-danger'))
        <div class="alert alert-danger"><p><strong>{{Session::get('alert-danger')}}</strong></p></div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
              <tr>
                  <th>Id</th>
                  <th>Profile Picture</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Active</th>
                  <th>Created</th>
                  <th>Updated</th>
              </tr>
            </thead>
            <tbody>
                @if($users)
                    @foreach($users as $user)
                          <tr>
                              <td>{{$user->id}}</td>
                              <td><img height="60" src="{{$user->photo?$user->photo->path:'/images/default-profile-image.png'}}" alt="profile picture"></td>
                              <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a></td>
                              <td>{{$user->email}}</td>
                              <td>{{ucfirst($user->role->name)}}</td>
                              <td>{{$user->is_active === 1? 'Active':'In-active'}}</td>
                              <td>{{$user->created_at->diffForHumans()}}</td>
                              <td>{{$user->updated_at->diffForHumans()}}</td>
                          </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection