@extends('layouts.app')

@section('content')
    <h3>Create Poll</h3>

    {!! Form::open(['action' => 'PollsController@store' , 'method'=>'POST' , 'enctype' => 'multipart/data']) !!}
        <div class="form-group">
            {{Form::label('title' , 'Title')}}
            {{Form::text('title' , '' , ['class' => 'form-control' , 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body' , 'Body')}}
            {{Form::textarea('body' , '' , ['id' => 'article-ckeditor', 'class' => 'form-control' , 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('descendants' , 'Descendants')}}
            {{Form::number('descendants' , '' , ['class' => 'form-control' , 'placeholder' => 'Descendants'])}}
        </div>
        <div class="form-group">
            {{Form::label('score' , 'Score')}}
            {{Form::number('score' , '' , ['class' => 'form-control' , 'placeholder' => 'Score'])}}
        </div>
        <div class="form-group">
            {{Form::label('url' , 'Url')}}
            {{Form::text('url' , '' , ['class' => 'form-control' , 'placeholder' => 'Url'])}}
        </div>
        {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  
@endsection