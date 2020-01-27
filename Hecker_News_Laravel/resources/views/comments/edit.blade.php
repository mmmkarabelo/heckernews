@extends('layouts.app')

@section('content')
    <h3>Edit Comment</h3>

    {!! Form::open(['action' => ['CommentsController@update', $comment ->comment_id] , 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title' , 'Title')}}
            {{Form::text('title' , $comment->title , ['class' => 'form-control' , 'placeholder' => 'Title'])}}
        </div>
        <?php $commentText = htmlspecialchars($comment->text); ?>
        <div class="form-group">
            {{Form::label('body' , 'Body')}}
            {{Form::textarea('body' , $commentText  , ['id' => 'article-ckeditor', 'class' => 'form-control' , 'placeholder' => 'Body Text'])}}
        </div>
    
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  
@endsection