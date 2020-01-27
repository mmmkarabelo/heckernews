@extends('layouts.app')

@section('content')
    <h3>Edit Question</h3>

    {!! Form::open(['action' => ['AskController@update', $ask ->ask_id] , 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title' , 'Title')}}
            {{Form::text('title' , $ask->title , ['class' => 'form-control' , 'placeholder' => 'Title'])}}
        </div>
        <?php $commentText = htmlspecialchars($ask->text); ?>
        <div class="form-group">
            {{Form::label('body' , 'Body')}}
            {{Form::textarea('body' , $commentText  , ['id' => 'article-ckeditor', 'class' => 'form-control' , 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('descendants' , 'Descendants')}}
            {{Form::number('descendants' , $ask->descendants , ['class' => 'form-control' , 'placeholder' => 'Descendants'])}}
        </div>
        <div class="form-group">
            {{Form::label('score' , 'Score')}}
            {{Form::number('score' , $ask->score , ['class' => 'form-control' , 'placeholder' => 'Score'])}}
        </div>
        <div class="form-group">
            {{Form::label('url' , 'Url')}}
            {{Form::text('url' , $ask->url , ['class' => 'form-control' , 'placeholder' => 'Url'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  
@endsection