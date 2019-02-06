@extends('layouts.app')

@section('content')

<section id="form">{{--form--}}
    <div class="container">

        <div class="row col-sm-12">
            @if( count($errors)>0 )
                @foreach( $errors->all() as $error )
                    <p class="alert alert-danger"> {{ $error }} </p>
                @endforeach
            @elseif( isset($loginFailed) )
                <p class="alert alert-danger"> {{ $loginFailed }} </p>
            @endif
        </div>

        <div class="row">

            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">{{--login form--}}
                    <h2>Login to your account</h2>

                    <form action="{{ url('/customer/login') }}" method="post" >
                        {{ csrf_field() }}
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus  placeholder="Email Address" />
                        <input type="password" id="password" name="password" required placeholder="Password" />
                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>

                </div>{{--/login form--}}
            </div>

            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>

            <div class="col-sm-4">
                <div class="signup-form">{{--sign up form--}}
                    <h2>New User Signup!</h2>

                    <form action="{{ url('/customer/register') }}" method="post">
                        {{ csrf_field() }}

                        <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Name" required />
                        <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required />
                        <input type="password" id="password" name="password" placeholder="Password" required />
                        <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Password" required />

                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>

                </div>{{--/sign up form--}}
            </div>

        </div>
    </div>
</section>{{--/form--}}

@endsection