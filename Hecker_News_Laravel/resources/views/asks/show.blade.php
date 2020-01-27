@extends('layouts.app')

@section('content')
    <a href="/v0/asks" class="btn btn-secondary" role="button">Go Back</a>
    <h3>{{$ask->title}}</h3>
    <div><lable>Text</lable>
        {{$ask->text}}
    </div>
    <div><lable>Descendant:</lable>
        {{$ask->descendants}}
    </div>
    <div><lable>Score:</lable>
        {{$ask->score}}
    </div>
    <div><lable>Comment By:</lable>
       {{$ask->user->name}}
    </div>
    <div><lable>Type:</lable>
        {{$ask->type}}
    </div>

    <hr>
    <small>Written on {{$ask->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id ==$ask ->user_id)
            <a href="/v0/asks/{{$ask->id}}/edit"  class="btn btn-secondary">Edit</a>

            {!!Form::open(['action' => ['askController@destroy' , $ask->ask_id], 'method' => 'POST' , 'class' => 'float-right'])!!}
                {{Form::hidden('_method' , 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
<hr>
    <div class="row">
        <div id="comment-form">
        {!!Form::open(['route' => ['comments.store' , $ask->ask_id], 'method' => 'POST' , 'class' => 'float-right'])!!}
            <div class="row">
                <div class="col-md-8">
                    {{Form::label('name', 'Name:')}}
                    {{Form::text('name',null, ['class' =>'form-control'])}}
                </div>
                <div class="col-md-8">
                    {{Form::label('comment', 'Comment:')}}
                    {{Form::textarea('comment',null, ['class' =>'form-control', 'rows' => '5'])}}

                    {{Form::submit('Add Comment', ['class' => 'btn btn-success', 'style'=>'margin-top:15px'])}}
                </div>
            </div>   
        {!!Form::close()!!}
        </div>
    </div>
@endsection 