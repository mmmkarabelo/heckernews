@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/v0/stories/create" class="btn btn-primary">Create Comment</a>
                    <h3>You are logged in!</h3>
                    @if(count($comments) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($comments as $comment)
                                <tr>
                                <td>{{$comment->title}}</td>
                                    <td><a href="/v0/comments/{{$comment->comment_id}}/edit" class ="btn btn-primary">Edit</a></td>
                                    <td>

                                        {!!Form::open(['action' => ['CommentsController@destroy' , $comment->comment_id], 'method' => 'POST' , 'class' => 'float-right'])!!}
                                        {{Form::hidden('_method' , 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <p>You have no comments</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
