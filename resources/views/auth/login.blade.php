<!-- resources/views/auth/login.blade.php -->

@extends('layouts.master')

@section('title', 'Login')

@section('content')

<div class="span12 text-left">
    <form method="POST" action="/auth/login" class="form-signin">
    {!! csrf_field() !!}
     <div class="col-sm-6">
      <h1>Login</h1>   
      
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
          <label class="sr-only" for="InputEmail1">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="InputEmail" placeholder="Email">
    </div>

    <div class="form-group">
        <label class="sr-only" for="InputPassword">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
    </div>
    
    <div class="form-group">
        <input type="checkbox" name="remember"> Remember Me
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Login</button>  <a href="/password/email">Forgot Your Password? </a>
    </div>
    <hr>     
    <div class="form-group"><a href="register">Register Here</a> if you are not a member yet</div>    
    </div>     
        
</form>
    
</div>
@endsection

