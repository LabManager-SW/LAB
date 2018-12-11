@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="../static/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center"><h3 style="margin-bottom: 50px;">실험일정 추가 및 공고</h3></div>
            <!-- calendar -->
            <div class="col-md-6">
                <h4>실험명: {{$data->name}}</h4><!--클릭한 데이터가 넘어와야 됨-->
                <div class="btn-spacing"></div>
                <div id='calendar'></div>
            </div>
            <!-- End calendar -->
            <!-- 실험정보 -->
            <div class="col-md-6">
                <form name="details" action="{{route('admin.experiment_details.store')}}" method="post"
                      enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group btn-spacing">
                        <label for="objective">실험 목표 및 내용</label>
                        <input type="text" id="objective" name="objective" class="form-control">
                        @if ($errors->has('objective'))
                            <div class="help-block">
                                {{ $errors->first('objective') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="health_condition">피실험자 자격</label>
                        <input type="text" id="health_condition" name="health_condition" class="form-control">
                        @if ($errors->has('health_condition'))
                            <div class="help-block">
                                {{ $errors->first('health_condition') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="location">실험 장소</label>
                        <input type="text" id="location" name="location" class="form-control">
                        @if ($errors->has('location'))
                            <div class="help-block">
                                {{ $errors->first('location') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="time_taken">소요시간</label>
                        <input type="text" id="time_taken" name="time_taken" class="form-control" value="">
                        @if ($errors->has('time_taken'))
                            <div class="help-block">
                                {{ $errors->first('time_taken') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="payment">피실험자 수당</label>
                        <input type="text" id="payment" class="form-control">
                        @if ($errors->has('payment'))
                            <div class="help-block">
                                {{ $errors->first('payment') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="method_desc">실험방법 설명</label>
                        <input type="text" id="method_desc" name="method_desc" class="form-control">
                        @if ($errors->has('method_desc'))
                            <div class="help-block">
                                {{ $errors->first('method_desc') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="datetime">실험 날짜 및 시간</label>
                        <input type="datetime-local" id="datetime" name="datetime" class="form-control">
                    </div>

                    <div class="text-right btn-spacing">
                        <input type="submit" name="enroll" id="enroll" class="btn btn-primary" value="등록하기">
                        <input type="button" onclick="history.go(-1);" name="back" id="back" class="btn btn-primary"
                               value="이전페이지">
                    </div>

                    <!-- End 실험정보 -->
                </form>
            </div>
        </div>
    </main>
@endsection
@section('script')
    <script src="../static/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>


    <!-- Page JS Plugins -->
    <script src="../static/assets/js/app.js?ver=2018072001"></script>

    <!-- List javascript -->
    <script>
        App.init('uiInit');
        var header = document.getElementById("active_event_1");
        var lists = header.getElementsByClassName("li_list");
        for (var i = 0; i < lists.length; i++) {
            lists[i].addEventListener("click", function () {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
        $("#mobile-slideBt").click(function () {
            if ($(".collapse").hasClass("in")) {
                $(".header_bg").hide()
            }
            else {
                $(".header_bg").show()
            }
        })
        $(".li_list").click(function () {
            $(".header_bg").hide()
            $('.collapse').collapse('hide')
        })

        $(".ul_arrow_list").click(function () {
            $(".header_bg").hide()
            $('.collapse').collapse('hide')
        })

    </script>

    <script>
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
                        @foreach($all_data as $value)
                    {
                        title: '{{$value['name']}}',
                        time: '{{$value['time_taken']}}',//실험 시간 컬럼
                        tester: '{{$value['tester_name']}}',//연구원명 컬럼들어가야됨
                        start: '{{$value['created_at']}}',
                        end: '{{$value['end_recruit_date']}}',
                        @if($value['required_applicant'] === $value['applicant'])
                        condition: "모집 완료",
                        @else
                        condition: "현재 인원: " + "{{$value['applicant']}}" + '/' + "{{$value['required_applicant']}}",
                        @endif
                    },
                    @endforeach
                ]
            });
        });
    </script>

@endsection