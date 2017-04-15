@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (Session::has('success'))
              <div class="alert alert-success">{{
              Session('success')}}
              </div>
              @endif
              </div>

            <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading">
                <div class="row">
                <div class="col-md-8"><h5>All Posts</h5></div>

                <div class="col-md-4"><span class="pull-right">
                <a href="{{ route('post.create') }}" class="btn btn-primary">Create Posts</a></span></div></div></div>
                <div class="panel-body">

                <table class="table">
                   <thead>
                       <th>ID</th>
                       <th>Title</th>
                       <th>Created</th>
                       <th>Updated</th>
                       <th>Action</th>
                            
                   </thead>
                   <tbody>
                   @foreach ($postview as $post)
                       <tr>
                           
                           <td>{{ $post->id }}</td>
                           <td>{{ $post->title }}</td>
                           <td>{{ $post->created_at }}</td>
                           <td>{{ $post->updated_at }}</td>
                            <td>
                            <div class="btn-group">
                            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-sm btn-default">Edit</a>
                            <a href="{{ route ('posts.delete', $post->id)}}" class="btn btn-sm btn-default">Delete</a>
                            </div></td>



                       </tr>
                       @endforeach
                   </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

