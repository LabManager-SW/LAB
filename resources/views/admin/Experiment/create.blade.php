@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            @if (\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Illuminate\Support\Facades\Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="text-center"><h3 style="margin-bottom: 50px;">새로 진행할 실험</h3></div>
            <!-- 실험정보 -->
            <div class="col-md-6">
                <form id="experiment" name="experiment" action="{{route('admin.experiment.store')}}" method="POST"
                      enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group btn-spacing">
                        <label for="name">실험명</label>
                        <input type="text" id="name" name="name" class="form-control">
                        @if ($errors->has('name'))
                            <div class="help-block">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="poa">실행계획</label>
                        <input type="text" id="poa" name="poa" class="form-control">
                        @if ($errors->has('poa'))
                            <div class="help-block">
                                {{ $errors->first('poa') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tester_name">담당 연구원</label>
                        <input type="text" id="tester_name" name="tester_name" class="form-control">
                        @if ($errors->has('tester_name'))
                            <div class="help-block">
                                {{ $errors->first('tester_name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="background">실험 추진 배경</label>
                        <input type="text" id="background" name="background" class="form-control">
                        @if ($errors->has('background'))
                            <div class="help-block">
                                {{ $errors->first('background') }}
                            </div>
                        @endif
                    </div>
                    <div class="text-center btn-spacing">
                        <input type="submit" name="experiment" id="experiment" class="btn btn-primary" value="실험 추가하기">
                    </div>
                </form>
            </div>
            <!-- End 실험정보 -->
        </div>
    </main>
@endsection
