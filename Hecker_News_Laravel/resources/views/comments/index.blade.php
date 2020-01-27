@extends('layouts.app')

@section('content')
    <h3>Items Comments</h3>
    
    @if(count($comments) > 0)
        <ul class="list-group">
            @foreach ($comments as $item)
             <li class="list-group-item">
                 <div class="well">
                 <?php $titletag = htmlspecialchars($item->title); ?>
                    <h5><a href="/v0/comments/{{$item->comment_id}}">{{$titletag}}</a></h5>
                    <small>Comment By {{$item->name}}</small><br>
                    <small>Written on {{$item->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$comments->links()}}
        </ul>
    @else
        <p>No stories found</p>
    @endif
@endsection