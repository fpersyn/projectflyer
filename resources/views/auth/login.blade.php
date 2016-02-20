@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1 class="text-center">Login</h1>

        <hr>

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="">E-Mail Address</label>

                <div class="">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="">Password</label>

                <div class="">
                    <input type="password" class="form-control" name="password">


                @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-btn fa-sign-in"></i>Login
                    </button>
                </div>
                <div class="col-md-12 text-center">
                    <!--<i class=""><a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a></i>-->
                </div>
            </div>
        </form>
</div>
@endsection
