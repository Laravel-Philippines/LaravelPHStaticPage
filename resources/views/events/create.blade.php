@extends('layouts.master')
@section('title', 'Create Event')

@section('content')
       <div class="container">
           <div class="row">
<div class="span12 text-left">
<div class="col-sm-6">
    <h1>Create Event</h1>
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/new-event" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
            <label for="event_title">Event Title</label>  
            <input required="required" value="{{ old('event_title') }}" placeholder="Enter title here" type="text" name = "event_title"class="form-control" />
      </div>
      
      <div class="form-group">
            <label for="event_description">Event Description</label>
            <textarea required="required" name='event_description'class="form-control" placeholder="Enter details here (What is it about?)">{{ old('event_description') }}</textarea>
      </div>
          
        <div class="form-group">
                <label for="event_startdate">Start when?</label>
                <input type="text" id="datetimepicker12a" name="event_startdate" />
        </div>
        <div class="form-group">
                <label for="event_enddate">End when?</label>
                <input type="text" id="datetimepicker12b" name="event_enddate" />
        </div>
       
        <div class="form-group">
            <label for="endevent_location">Where?</label>  
            <input required="required" value="{{ old('event_location') }}" placeholder="Enter location here" type="text" name = "event_location"class="form-control" />
        </div>
        
      <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
      <!-- <input type="submit" name='save' class="btn btn-default" value = "Save Draft" /> -->
    </form>

    </div></div></div>
@endsection
