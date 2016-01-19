@extends('layouts.master')
@section('title', 'Edit Event')

@section('content')
       <div class="container">
           <div class="row">
<div class="span12 text-left">
<div class="col-sm-6">
    <h1>Edit Event</h1>
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/events/{{ $event->slug }}/edit" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <!-- TODO -->
      <input type="hidden" name="event_id" value="{{ $event->id }}{{ old('event_id') }}">
      
      
      <div class="form-group">
            <label for="event_title">Event Title</label>  
            <input required="required" value="@if(!old('event_title')){{ $event->title }} @endif{{ old('event_title') }}" placeholder="Enter title here" type="text" name = "event_title"class="form-control" />
      </div>
      
      <div class="form-group">
            <label for="event_description">Event Description</label>
            <textarea required="required" name='event_description'class="form-control" placeholder="Enter details here (What is it about?)">@if(!old('event_description')){{ $event->description }} @endif{{ old('event_description') }}</textarea>
      </div>
          
        <div class="form-group">
                <label for="event_startdate">Start when?</label>
                <input type="text" id="datetimepicker12a" name="event_startdate" value="{{ $event->event_startdatetime->format('m/d/Y g:i A') }}" />
        </div>
        <div class="form-group">
                <label for="event_enddate">End when?</label>
                <input type="text" id="datetimepicker12b" name="event_enddate" value="{{ $event->event_enddatetime->format('m/d/Y g:i A') }}" />
        </div>
       
        <div class="form-group">
            <label for="endevent_location">Where?</label>  
            <input required="required" value="@if(!old('event_location')){{ $event->location }} @endif{{ old('event_location') }}" placeholder="Enter location here" type="text" name="event_location" class="form-control" />
        </div>
        
      <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
      <!-- <input type="submit" name='save' class="btn btn-default" value = "Save Draft" /> -->
    </form>

    </div></div></div>
@endsection
