@extends('layouts.app')

@section('content')
    <h3>Poll Comments</h3>
    
    @if(count($polls) > 0)
        <ul class="list-group">
            @foreach ($polls as $poll)
             <li class="list-group-item">
                 <div class="well">
                 <?php $titletag = htmlspecialchars($poll->title); ?>
                    <h5><a href="/v0/polls/{{$poll->poll_id}}">{{$titletag}}</a></h5>
                    <small>Comment By {{$poll->name}}</small><br>
                    <small>Written on {{$poll->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$polls->links()}}
        </ul>
    @else
        <p>No polls found</p>
    @endif
@endsection