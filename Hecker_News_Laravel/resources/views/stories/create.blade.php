@extends('layouts.app')

@section('content')
    <h3>Create Comment</h3>

    {!! Form::open(['action' => 'StoryController@store' , 'method'=>'POST' , 'enctype' => 'multipart/data']) !!}
        <div class="form-group">
            {{Form::label('title' , 'Title')}}
            {{Form::text('title' , '' , ['class' => 'form-control' , 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body' , 'Body')}}
            {{Form::textarea('body' , '' , ['id' => 'article-ckeditor', 'class' => 'form-control' , 'placeholder' => 'Body Text'])}}
        </div>
        
        <div class="form-group">
            {{Form::label('type' , 'Comment Type')}}
            {{ Form::select('type', ['Story' =>'Story', 'Comment' =>'Comment', 'Job'=>'Job', 'Question'=>'Question', 'Poll'=>'Poll'],"", ['class' => 'form-control' ,'id' => 'type']) }}
        </div>
        {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  
@endsection