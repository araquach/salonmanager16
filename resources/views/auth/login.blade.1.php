@extends('layouts.main')

@section('head')

@include('layouts.partials.head')

@stop

@section('content')
<div class="container">
    <div class="row">
        <div>
            <div>
                <div>Login</div>
                <div>
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div>
                            <label for="email">E-Mail Address</label>

                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="password">Password</label>

                            <div>
                                <input id="password" type="password" name="password">

                                @if ($errors->has('password'))
                                        <strong>{{ $errors->first('password') }}</strong>
                                @endif
                            </div>
                        </div>

                        <div>
                            <div>
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                        </div>

                        <div>
                            <div>
                                <button type="submit">
                                    Login
                                </button>

                                <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
