@extends('layouts.master')

@section('title', 'Register')

@section('content')
       <div class="container">
           <div class="row">
<div class="span12 text-left">
<div class="col-sm-6">
<form method="POST" action="/auth/register">
    {!! csrf_field() !!}
    
    <h1>Register</h1>    
    
    @if (count($errors) > 0)
	<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
	     @foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	     @endforeach

    </ul>
    </div>

    @endif    
    
    
    <div class="form-group">
         <label class="sr-only" for="InputName">Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="InputName" placeholder="Name">
    </div>

    <div class="form-group">
        <label class="sr-only" for="InputEmail">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="InputEmail" placeholder="Email">
    </div>

    <div class="form-group">
        <label class="sr-only" for="InputPassword">Password</label>
        <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Password">
    </div>

    <div class="form-group">
        <label class="sr-only" for="InputConfirmPassword">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="InputConfirmPassword" placeholder="Confirm Password">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
</form>
</div>
               </div></div>
@endsection
