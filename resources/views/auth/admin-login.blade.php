@extends('layouts.app')
@section('content')
    <main id="main-container">
        <!-- Header -->
        <div class="text-center logo_position">
            <a href="{{('/home')}}"><img src="/dongsu/img/img-logo.png" class="logo_size"></a>
        </div>
        <!--End Header -->

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="{{('/login')}}" class="{{preg_match('/\/\/login/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}" id="register-form-link">실험 지원자</a>
                                </div>
                                <div class="col-xs-6">
                                    <a href="{{route('admin.login')}}" class="{{preg_match('/\/admin\/login/', $_SERVER['REQUEST_URI']) ? 'active' : ''}}" id="register-form-link">연구원</a>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="{{route('admin.login.submit')}}" method="POST" role="form" style="display: block;">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                            <input type="text" name="username" id="username" tabindex="1"
                                                   class="form-control" placeholder="Username" value="{{old('username')}}" required autofocus>
                                            @if ($errors->has('username'))
                                                <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input type="password" name="password" id="password" tabindex="2"
                                                   class="form-control" placeholder="Password">
                                            @if ($errors->has('password'))
                                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                            @endif
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember" {{old('remember') ? 'checked' : ''}}>
                                            <label for="remember"> Remember Me</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Login">
                                                </div>
                                            </div>
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Page JS Plugins -->
    <script src="/dongsu/js/app.js?ver=2018072001"></script>
@endsection