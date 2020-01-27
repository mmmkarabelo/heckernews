@extends('layouts.app')

@section('content')
    <h3>Best Stories</h3>
    
    @if(count($beststories) > 0)
        <ul class="list-group">
            @foreach ($beststories as $beststory)
             <li class="list-group-item">
                 <div class="well">
                 <?php $titletag = htmlspecialchars($beststory->title); ?>
                    <h5><a href="#">{{$titletag}}</a></h5>
                    <small>Comment By {{$beststory->name}}</small><br>
                    <small>Written on {{$beststory->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$beststories->links()}}
        </ul>
    @else
        <p>No besstories found</p>
    @endif
@endsection