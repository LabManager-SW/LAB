@extends('layouts.app')
@section('content')
    <main id="main-container">
        <!-- Header -->
        <div class="text-center logo_position">
            <a href="{{route('home')}}"><img src="/dongsu/img/img-logo.png" class="logo_size"></a>
        </div>
        <!--End Header -->

        <!--실험 지원자 회원가입 폼 -->
        <h3 class="text-center">연구원 회원가입</h3>
        <div style="margin-left: 15%; margin-right: 15%; margin-top: 20px;">
            <form name="researcher_register" action="{{route('admin.register')}}" method="POST">
                <div class="form-group">
                    <label for="username">연구원 아이디</label>
                    <input id="username" name="username" type="text" value="{{ old('username') }}"
                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                           placeholder="아이디를 입력하세요." required autofocus>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">비밀번호</label>
                    <input id="password" name="password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="비밀번호를 입력하세요.">
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm">비밀번호 확인</label>
                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control"
                           placeholder="비밀번호를 다시 입력하세요." required>
                </div>
                <div class="form-group">
                    <label for="name">이름</label>
                    <input type="text" id="name" name="name"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="이름을 입력하세요."
                           required>
                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="lab_name">연구실 이름</label>
                    <input type="text" id="lab_name" name="lab_name"
                           class="form-control{{ $errors->has('lab_name') ? ' is-invalid' : '' }}"
                           placeholder="연구실명을 입력하세요." required>
                    @if ($errors->has('lab_name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lab_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="univ">대학교</label>
                    <input type="text" id="univ" name="univ"
                           class="form-control{{ $errors->has('univ') ? ' is-invalid' : '' }}"
                           placeholder="대학교명을 입력하세요." required>
                    @if ($errors->has('univ'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('univ') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="dept">소속 부서</label>
                    <input type="text" id="dept" name="dept"
                           class="form-control{{ $errors->has('dept') ? ' is-invalid' : '' }}"
                           placeholder="소속 부서명을 입력하세요." required>
                    @if ($errors->has('dept'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('dept') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">이메일</label>
                    <input id="email" name="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="이메일을 입력하세요." value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                       class="form-control btn btn-login" value="가입하기">
            </form>
        </div>
        <!-- End 실험 지원자 회원가입 폼 -->

    </main>
@endsection