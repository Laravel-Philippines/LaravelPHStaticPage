@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<div class="span12 text-left">
<div class="col-sm-6">
    <h2>Hello {{ $user['name'] }},</h2>
    
    <h1>Events you posted</h1>    
    @if ( !$events->count() )
        <button type="button" class="btn btn-lg btn-primary">Post your Event</button>
    @else
    <div class="">
      @foreach( $events as $event )
      <div class="list-group">
        <div class="list-group-item">
          <h3><a href="{{ url('/'.$event->slug) }}">{{ $event->title }}</a>
          {{--    
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
            HTML --}}
        </div>
      </div>
      @endforeach
        <a href="new-event"><button type="button" class="btn btn-lg btn-primary">Post more Events</button></a>
    </div>
    @endif
    
    
    <hr>
    
    <h1>Jobs you posted</h1> 
    <a href=""></a><button type="button" class="btn btn-lg btn-primary">Primary</button></a>
</div>
@endsection
