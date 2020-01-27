@extends('layouts.app')

@section('content')
    <h3>New Stories</h3>
    
    @if(count($newstories) > 0)
        <ul class="list-group">
            @foreach ($newstories as $newstory)
             <li class="list-group-item">
                 <div class="well">
                 <?php $titletag = htmlspecialchars($newstory->title); ?>
                    <h5><a href="#">{{$titletag}}</a></h5>
                    <small>Comment By {{$newstory->name}}</small><br>
                    <small>Written on {{$newstory->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$newstories->links()}}
        </ul>
    @else
        <p>No newstories found</p>
    @endif
@endsection