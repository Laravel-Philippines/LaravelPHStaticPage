@extends('layouts.master')
@section('title', 'Create Job')

@section('content')
       <div class="container">
           <div class="row">
<div class="span12 text-left">
<div class="col-sm-6">
    <h1>Create Job</h1>
    
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/new-job" method="post">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
            <label for="Job_title">Job Title</label>  
            <input required="required" value="{{ old('job_title') }}" placeholder="Enter title here" type="text" name = "job_title"class="form-control" />
      </div>
      
      <div class="form-group">
            <label for="Job_title">Full Time or Part Time?</label> <br>
            <input type="radio" name="fulltime" value="1" checked> Full Time
            <input type="radio" name="fulltime" value="0"> Part Time
      </div>
      <div class="form-group">
            <label for="Job_title">Remote or Office Based?</label> <br>
            <input type="radio" name="remote" value="1" checked> Remote
            <input type="radio" name="remote" value="0"> Office Based
      </div>
      <div class="form-group">
            <label for="Job_description">Job Description</label>
            <textarea required="required" name='job_description'class="form-control" placeholder="Enter details here">{{ old('job_description') }}</textarea>
      </div>
      <div class="form-group">
            <label for="Job_description">Job Requirments</label>
            <textarea required="required" name='job_requirements'class="form-control" placeholder="Enter requirements here)">{{ old('job_requirements') }}</textarea>
      </div>
      
        
      <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
      <!-- <input type="submit" name='save' class="btn btn-default" value = "Save Draft" /> -->
    </form>

    </div></div></div>
@endsection
