@extends('layouts.app')

@section('content')
    <h3>Edit Story</h3>

    {!! Form::open(['action' => ['StoryController@update', $story ->story_id] , 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title' , 'Title')}}
            {{Form::text('title' , $story->title , ['class' => 'form-control' , 'placeholder' => 'Title'])}}
        </div>
        <?php $commentText = htmlspecialchars($story->text); ?>
        <div class="form-group">
            {{Form::label('body' , 'Body')}}
            {{Form::textarea('body' , $commentText  , ['id' => 'article-ckeditor', 'class' => 'form-control' , 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('descendants' , 'Descendants')}}
            {{Form::number('descendants' , $story->descendants , ['class' => 'form-control' , 'placeholder' => 'Descendants'])}}
        </div>
        <div class="form-group">
            {{Form::label('score' , 'Score')}}
            {{Form::number('score' , $story->score , ['class' => 'form-control' , 'placeholder' => 'Score'])}}
        </div>
        <div class="form-group">
            {{Form::label('url' , 'Url')}}
            {{Form::text('url' , $story->url , ['class' => 'form-control' , 'placeholder' => 'Url'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  
@endsection