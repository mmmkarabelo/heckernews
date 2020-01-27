@extends('layouts.app')

@section('content')
    <a href="/v0/jobs" class="btn btn-secondary" role="button">Go Back</a>
    <h3>{{$job->title}}</h3>
    <div><lable>Text</lable>
        {{$job->text}}
    </div>
    <div><lable>Descendant:</lable>
        {{$job->descendants}}
    </div>
    <div><lable>Score:</lable>
        {{$job->score}}
    </div>
    <div><lable>Comment By:</lable>
       {{$job->user->name}}
    </div>
    <div><lable>Type:</lable>
        {{$job->type}}
    </div>

    <hr>
    <small>Written on {{$job->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id ==$job ->user_id)
            <a href="/v0/jobs/{{$job->job_id}}/edit"  class="btn btn-secondary">Edit</a>

            {!!Form::open(['action' => ['jobController@destroy' , $job->job_id], 'method' => 'POST' , 'class' => 'float-right'])!!}
                {{Form::hidden('_method' , 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
        <hr>
    @endif

    <div class="row">
        <div id="comment-form">
        {!!Form::open(['route' => ['comments.store' , $job->job_id], 'method' => 'POST' , 'class' => 'float-right'])!!}
            <div class="row">
                <div class="col-md-8">
                    {{Form::label('name', 'Name:')}}
                    {{Form::text('name',null, ['class' =>'form-control'])}}
                </div>
                <div class="col-md-8">
                    {{Form::label('comment', 'Comment:')}}
                    {{Form::textarea('comment',null, ['class' =>'form-control', 'rows' => '5'])}}

                    {{Form::submit('Add Comment', ['class' => 'btn btn-success', 'style'=>'margin-top:15px' , 'disabled'])}}
                </div>
            </div>   
        {!!Form::close()!!}
        </div>
    </div>
@endsection 