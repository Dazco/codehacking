@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
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
                <th>Display Picture</th>
                <th>Author</th>
                <th>Category</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td><img height="60" src="{{$post->photo?$post->photo->path:'/images/default-profile-image.png'}}" alt="Display picture"></td>
                        <td><a href="{{route('admin.users.edit',$post->user->id)}}">{{$post->user->name}}</a></td>
                        <td>{{strtoupper($post->category->name)}}</td>
                        <td>{{$post->title}}</td>
                        <td>{!! str_limit($post->content,30,'...')!!}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection