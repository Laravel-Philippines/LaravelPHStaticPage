@extends('layouts.master')

@section('title', 'Forgot Password')

@endsection

@section('content')
  
<div class="span12 text-left">
    <div class="col-sm-6">
    <h1>Reset your Password</h1> 
<form method="POST" action="/password/reset" class="form-signin">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">

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
        <input type="password" name="password_confirmation" class="form-control" id="InputPassword" placeholder="Confirm Password">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">
            Reset Password
        </button>
    </div>
</form>
</div>
</div>
@endsection