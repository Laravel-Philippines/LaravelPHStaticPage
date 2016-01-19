@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="container">
<div class="row">
<div class="span12 text-left">
<div class="col-sm-6">
    <h2>Hello {{ $user['name'] }},</h2>
    
    @if (Session::has('message'))
      <div class="flash alert-info">
        <p class="panel-body">
          {{ Session::get('message') }}
        </p>
      </div>
      @endif
      
      
      @if ($errors->any())
      <div class='flash alert-danger'>
        <ul class="panel-body">
          @foreach ( $errors->all() as $error )
          <li>
            {{ $error }}
          </li>
          @endforeach
        </ul>
      </div>
      @endif
    
    
    <h1>Events you posted</h1>    
    @if ( !$events->count() )
        <a href="new-event"><button type="button" class="btn btn-lg btn-primary">Post your Event</button></a>
    @else
    <div class="">
      @foreach( $events as $event )
      
      <div class="list-group">
        <div class="list-group-item">
            <div class="row">
                <div class="col-sm-6">
                    <h3><a href="{{ url('/'.$event->slug) }}">{{ $event->title }}</a>

                    {{--    <!--
                    @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
                      @if($post->active == '1')
                      <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Post</a></button>
                      @else
                      <button class="btn" style="float: right"><a href="{{ url('edit/'.$post->slug)}}">Edit Draft</a></button>
                      @endif
                    @endif

                    </h3>
                    <p>{{ $post->created_at->format('M d,Y \a\t h:i a') }} By <a href="{{ url('/user/'.$post->author_id)}}">{{ $post->author->name }}</a></p>
                    </div>
                    <div class="list-group-item">
                    <article>
                        {!! str_limit($post->body, $limit = 1500, $end = '....... <a href='.url("/".$post->slug).'>Read More</a>') !!}
                    </article>
                    -->
                    HTML --}}
                </div>
            </div>    
            <div class="row actionlinks">     
                <div class="col-sm-6">
                    <a href="{{ url('/events/'.$event->slug.'/edit') }}">Edit</a>
                </div>
                 <div class="col-sm-6">
                    <a href="{{ url('/events/'.$event->id.'/delete') }}">Delete</a>
                </div>
            </div> 
       </div>
      </div>
        
      @endforeach
        <a href="new-event"><button type="button" class="btn btn-lg btn-primary">Post more Events</button></a>
    </div>
    @endif
    
    
    <hr>
    
    <h1>Jobs you posted</h1> 
    
    @if ( !$jobs->count() )
        <a href="new-job"><button type="button" class="btn btn-lg btn-primary">Post your Job</button></a>
    @else
    <div class="">
      @foreach( $jobs as $job )
      
      <div class="list-group">
        <div class="list-group-item">
            <div class="row">
                <div class="col-sm-6">
                    <h3><a href="{{ url('/'.$job->id) }}">{{ $job->title }}</a>
                </div>
            </div>    
            <div class="row actionlinks">     
                <div class="col-sm-6">
                    <a href="{{ url('/jobs/'.$job->id.'/'.str_slug($job->title).'/edit') }}">Edit</a>
                </div>
                 <div class="col-sm-6">
                    <a href="{{ url('/jobs/'.$job->id.'/delete') }}">Delete</a>
                </div>
            </div> 
       </div>
      </div>
        
      @endforeach
        <a href="new-job"><button type="button" class="btn btn-lg btn-primary">Post more Jobs</button></a>
    </div>
    @endif
</div>
</div></div>
@endsection
