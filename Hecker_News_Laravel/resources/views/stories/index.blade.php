@extends('layouts.app')

@section('content')
    <h3>Story Comments</h3>
    
    @if(count($stories) > 0)
        <ul class="list-group">
            @foreach ($stories as $story)
             <li class="list-group-item">
                 <div class="well">
                 <?php $titletag = htmlspecialchars($story->title); ?>
                    <h5><a href="/v0/stories/{{$story->story_id}}">{{$titletag}}</a></h5>
                    <small>Comment By {{$story->name}}</small><br>
                    <small>Written on {{$story->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$stories->links()}}
        </ul>
    @else
        <p>No stories found</p>
    @endif
@endsection