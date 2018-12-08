@extends('layouts.app')
@section('content')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#calendar').fullCalendar({

                <!--Header Section Including Previous,Next and Today-->
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },

                <!--Default Date-->
                defaultDate: '{{\Carbon\Carbon::now()}}', lang: 'ko',
                editable: true,

                <!--Event Section-->
                eventLimit: true, // allow "more" link when too many events
                // 여기서 PHP 코드로 값 불러와서 작성가능, 아래는 예시로 넣어 놓은 것들
                events: [
                        @foreach($data as $value)
                    {
                        title: '{{$value['name']}}',
                        start: '{{$value['created_at']}}',
                        end: '{{$value['end_recruit_date']}}'
                    },
                    @endforeach
                ]
            });
        });
    </script>
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center">
                <h3>
                    연구원 메인페이지
                </h3>
            </div>
            <!-- calendar -->
            <div class="col-md-6 btn-spacing">
                <h3 class="text-left">실험일정 캘린더</h3>
                <div class="btn-spacing"></div>
                <div id='calendar'></div>
            </div>
            <!-- End calendar -->
            <!-- 실험정보 -->
            <div class="col-md-6 btn-spacing">
                <h3 class="text-left">실험 관리</h3>
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
                          class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span
                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <div class="text-center btn-spacing">
                    <a href="{{url('admin/experiment_details/create')}}">
                        <button type="button" name="re-add" id="re-add" class="btn btn-primary">새로운 실험 추가</button>
                    </a>
                </div>
            </div>
            <!-- End 실험정보 -->
        </div>
    </main>
@endsection
