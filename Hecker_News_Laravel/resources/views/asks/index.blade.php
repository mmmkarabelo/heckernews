@extends('layouts.app')

@section('content')
    <h3>Questions Comments</h3>
    
    @if(count($asks) > 0)
        <ul class="list-group">
            @foreach ($asks as $ask)
             <li class="list-group-item">
                 <div class="well">
                 <?php $titletag = htmlspecialchars($ask->title); ?>
                    <h5><a href="/v0/asks/{{$ask->id}}">{{$titletag}}</a></h5>
                    <small>Comment By {{$ask->name}}</small><br>
                    <small>Written on {{$ask->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$asks->links()}}
        </ul>
    @else
        <p>No asks found</p>
    @endif
@endsection