@extends('layouts.app')
@section('content')
    <main id="main-container">
        <!-- Header -->
        <div class="text-center logo_position">
            <a href="/"><img src="/dongsu/img/img-logo.png" class="logo_size"></a>
        </div>
        <!--End Header -->

        <!--Login Icon -->

        <div class="feature_interval text-center">
            <div class="col-sm-6 remove-padding" onclick="location.href='/register'" style="cursor: pointer;">
                <img src="/dongsu/img/login-user.png" class="icon_size_1">
                <p class="solution_font">실험 지원자 회원가입</p>
            </div>
            <div class="col-sm-6 remove-padding" onclick="location.href='/admin/register'" style="cursor: pointer;">
                <img src="/dongsu/img/login-researcher.png" class="icon_size_1">
                <p class="solution_font">연구원 회원가입</p>
            </div>
            @if(\Illuminate\Support\Facades\Auth::check())
            <div name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" style="cursor:none;"
            onclick="location.href='/logout'">Log Out</div>
                @else
                <div name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login"
                     onclick="location.href='/login'">LOGIN</div>
                @endif
        </div>
        <!-- End Login Icon -->
    </main>
@endsection