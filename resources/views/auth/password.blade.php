<!-- resources/views/auth/login.blade.php -->

@extends('layouts.master')

@section('title', 'Forgot Password')

@endsection

@section('content')
  
<div class="span12 text-left">
    <div class="col-sm-6">
    <h1>Forgot Password</h1> 
    <form method="POST" action="/password/email" class="form-signin">
    {!! csrf_field() !!}

    <div class="form-group">
        <label class="sr-only" for="InputEmail">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="InputEmail" placeholder="Email">
    </div>

    <div>
        <button type="submit" class="btn btn-primary">
            Send Password Reset Link
        </button>
    </div>
    </form>
    </div>
</div>
@endsection



