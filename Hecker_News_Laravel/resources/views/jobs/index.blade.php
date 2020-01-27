@extends('layouts.app')

@section('content')
    <h3>Jobs Comments</h3>
    
    @if(count($jobs) > 0)
        <ul class="list-group">
            @foreach ($jobs as $job)
             <li class="list-group-item">
                 <div class="well">
                 <?php $titletag = htmlspecialchars($job->title); ?>
                    <h5><a href="/v0/jobs/{{$job->job_id}}">{{$titletag}}</a></h5>
                    <small>Comment By {{$job->name}}</small><br>
                    <small>Written on {{$job->created_at}}</small>
                </div>
             </li>
                
            @endforeach
            {{$jobs->links()}}
        </ul>
    @else
        <p>No jobs found</p>
    @endif
@endsection