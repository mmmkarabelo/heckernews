@extends('layouts.app')

@section('content')
    <h3>Top Stories</h3>
    
    @if(count($topstories) > 0)
        <ul class="list-group">
            @foreach ($topstories as $topstory)
             <li class="list-group-item">
                 <div class="well">
                 <?php $titletag = htmlspecialchars($topstory->title); ?>
                    <h5><a href="#">{{$titletag}}</a></h5>
                    <small>Comment By {{$topstory->name}}</small><br>
                    <small>Written on {{$topstory->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$topstories->links()}}
        </ul>
    @else
        <p>No topstories found</p>
    @endif
@endsection