@extends('layouts.app')

@section('content')
    <a href="/v0/polls" class="btn btn-secondary" role="button">Go Back</a>
    <h3>{{$poll->title}}</h3>
    <div><lable>Text</lable>
        {{$poll->text}}
    </div>
    <div><lable>Descendant:</lable>
        {{$poll->descendants}}
    </div>
    <div><lable>Score:</lable>
        {{$poll->score}}
    </div>
    <div><lable>Comment By:</lable>
       {{$poll->user->name}}
    </div>
    <div><lable>Type:</lable>
        {{$poll->type}}
    </div>

    <hr>
    <small>Written on {{$poll->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id ==$poll ->user_id)
            <a href="/v0/polls/{{$poll->poll_id}}/edit"  class="btn btn-secondary">Edit</a>

            {!!Form::open(['action' => ['PollsController@destroy' , $poll->poll_id], 'method' => 'POST' , 'class' => 'float-right'])!!}
                {{Form::hidden('_method' , 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!} <hr>
        @endif
       
    @endif
<hr>
    <div class="row">
        <div id="comment-form">
        {!!Form::open(['route' => ['comments.store' , $poll->poll_id], 'method' => 'POST' , 'class' => 'float-right'])!!}
            <div class="row">
                <div class="col-md-8">
                    {{Form::label('name', 'Name:')}}
                    {{Form::text('name',null, ['class' =>'form-control'])}}
                </div>
                <div class="col-md-8">
                    {{Form::label('comment', 'Comment:')}}
                    {{Form::textarea('comment',null, ['class' =>'form-control', 'rows' => '5'])}}

                    {{Form::submit('Add Comment', ['class' => 'btn btn-success', 'style'=>'margin-top:15px', 'disabled'])}}
                </div>
            </div>   
        {!!Form::close()!!}
        </div>
    </div>
@endsection 