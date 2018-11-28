@extends('layouts.app')
@section('content')
    <main id="main-container">
        <!-- Header -->
        <div class="text-center logo_position">
            <a href="{{route('home')}}"><img src="/dongsu/img/img-logo.png" class="logo_size"></a>
        </div>
        <!--End Header -->

        <!--실험 지원자 회원가입 폼 -->
        <h3 class="text-center">실험 지원자 회원가입</h3>
        <div style="margin-left: 15%; margin-right: 15%; margin-top: 20px;">
            <form action="{{route('register')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="username">아이디</label>
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
                    <label for="birth">생년월일</label>
                    <input type="date" id="birth" name="birth"
                           class="form-control{{ $errors->has('birth') ? ' is-invalid' : '' }}" value="{{old('birth')}}"
                           required>
                </div>
                <div class="form-group">
                    <label>성별</label>
                    <p><input type="radio" name="gender" value="male" checked>남자
                        <input type="radio" name="gender" value="female">여자</p>
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
                    <label for="phone">전화번호</label>
                    <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                           name="phone" value="{{ old('phone') }}" required maxlength="11"
                           pattern="[0-9]{10}[0-9]?" title="'-'를 뺀 휴대전화 번호 10~11자리를 입력해주세요.">
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone') }}</strong>
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