@extends('layouts.app')

@section('content')
    <h3>Edit Job</h3>

    {!! Form::open(['action' => ['JobsController@update', $job ->job_id] , 'method'=>'POST']) !!}
        <div class="form-group">
            {{Form::label('title' , 'Title')}}
            {{Form::text('title' , $job->title , ['class' => 'form-control' , 'placeholder' => 'Title'])}}
        </div>
        <?php $commentText = htmlspecialchars($job->text); ?>
        <div class="form-group">
            {{Form::label('body' , 'Body')}}
            {{Form::textarea('body' , $commentText  , ['id' => 'article-ckeditor', 'class' => 'form-control' , 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::label('descendants' , 'Descendants')}}
            {{Form::number('descendants' , $job->descendants , ['class' => 'form-control' , 'placeholder' => 'Descendants'])}}
        </div>
        <div class="form-group">
            {{Form::label('score' , 'Score')}}
            {{Form::number('score' , $job->score , ['class' => 'form-control' , 'placeholder' => 'Score'])}}
        </div>
        <div class="form-group">
            {{Form::label('url' , 'Url')}}
            {{Form::text('url' , $job->url , ['class' => 'form-control' , 'placeholder' => 'Url'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
  
@endsection