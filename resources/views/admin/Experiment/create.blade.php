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
                        <label for="tester_id">담당 연구원</label>
                        <select id="tester_id" name="tester_id" class="form-control">
                            <option disabled selected>담당 연구원을 선택해주세요</option>
                            @foreach($tester as $value)
                                <option value={{$value->id}}>{{$value->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('tester_id'))
                            <div class="help-block">
                                {{ $errors->first('tester_id') }}
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

            <!-- 실험 추가 화면 -->
            <div class="col-md-6 btn-spacing">
                <h3 class="text-left"><span>OOO</span>이 추가되었습니다.</h3>
                <div class="btn-spacing">
                    <select class="js-select2 form-control select2-hidden-accessible" id="example-select2"
                            name="example-select2" style="width: 100%;" data-placeholder="" tabindex="-1"
                            aria-hidden="true">
                        <option>실험명</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        @foreach($all as $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                    <span class="select2 select2-container select2-container--default select2-container--below"
                          dir="ltr" style="width: 100%;">
              <span class="selection"><span class="select2-selection select2-selection--single" role="combobox"
                                            aria-haspopup="true" aria-expanded="false" tabindex="0"
                                            aria-labelledby="select2-example-select2-container"><span
                              class="select2-selection__rendered" id="select2-example-select2-container"></span><span
                              class="select2-selection__arrow" role="presentation"><b
                                  role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                                                                     aria-hidden="true"></span></span>
                </div>
            </div>
            <!-- End 실험 추가 화면 -->

        </div>
    </main>
@endsection
