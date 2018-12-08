@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center"><h3 style="margin-bottom: 50px;">새로 진행할 실험</h3></div>
            <!-- 실험정보 -->
            <div class="col-md-6">
                <form name="" onsubmit="" action="" method="post">
                    <div class="form-group btn-spacing">
                        <label>실험명</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>실행계획</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>담당 연구원</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>실험 추진 배경</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="text-center btn-spacing">
                        <input type="submit" name="enroll" id="enroll" class="btn btn-primary" value="실험 추가하기">
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
                        <option value="1">HTML</option>
                        <option value="2">CSS</option>
                        <option value="3">JavaScript</option>
                        <option value="4">PHP</option>
                        <option value="5">MySQL</option>
                        <option value="6">Ruby</option>
                        <option value="7">AngularJS</option>
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
