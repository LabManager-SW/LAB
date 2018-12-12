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
                defaultDate: '{{\Illuminate\Support\Carbon::now()}}', lang: 'ko',
                editable: true,

                <!--Event Section-->
                eventLimit: true, // allow "more" link when too many events
                // 여기서 PHP 코드로 값 불러와서 작성가능, 아래는 예시로 넣어 놓은 것들
                events: [
                        @foreach($data as $value)
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
                ],

                eventRender: function (event, element) {
                    element.find('.fc-title').append("<br/>" + event.time);
                    element.find('.fc-title').append("<br/>" + event.tester);
                    element.find('.fc-title').append("<br/>" + event.condition);
                }
            });
        });
    </script>
    <main id="main-container">
        <div class="container logo_spacing">
            @if (\Illuminate\Support\Facades\Session::has('message'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Illuminate\Support\Facades\Session::get('message') !!}</li>
                    </ul>
                </div>
        @endif
        <!-- 실험정보 -->
            <h3 class="text-left">임상실험 모집.</h3>
            <div class="col-md-4">
                <h4 class="btn-spacing">실험명: {{$data->name}}</h4>
                <form>
                    <div class="form-group">
                        <label for="poa">실험 목표 및 내용</label>
                        <input type="text" id="poa" class="form-control" value="{{$data->poa}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="health_condition">피실험자 자격</label>
                        <input type="text" id="health_condition" class="form-control"
                               value="{{$data->health_condition}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="location">실험 장소</label>
                        <input type="text" id="location" class="form-control" value="{{$data->location}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="time_taken">소요시간</label>
                        <input type="text" id="time_taken" class="form-control" value="{{$data->time_taken}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="payment">피실험자 수당</label>
                        <input type="text" id="payment" class="form-control" value="{{$data->payment}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="method_desc">실험방법 설명</label>
                        <input type="text" id="method_desc" class="form-control" value="{{$data->method_desc}}"
                               disabled>
                    </div>
                    <div class="form-group">
                        <label for="tester_name">담당 연구원</label>
                        <input type="text" id="tester_name" class="form-control" value="{{$data->tester_name}}" disabled>
                    </div>
                </form>
            </div>
            <!-- End 실험정보 -->
            <!-- calendar -->
            <div class="col-md-8">
                <div id='calendar'>
                </div>
                <div class="text-right btn-spacing">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <button type="button" class="btn btn-primary"
                                onclick="location.href='/apply/{{$data->id}}/{{\Illuminate\Support\Facades\Auth::id()}}'">
                            지원하기
                        </button>
                        <a href="{{url('/user_home')}}"><input type="submit" name="mainpage" id="mainpage"
                                                               class="btn btn-primary"
                                                               value="메인페이지로"></a>
                    @else
                        <input type="submit" name="apply" id="apply" class="btn btn-primary" value="지원하기"
                               onclick="location.href='/login'">
                        <a href="{{url('/login')}}"><input type="submit" name="mainpage" id="mainpage"
                                                           class="btn btn-primary"
                                                           value="메인페이지로"></a>
                    @endif
                </div>
            </div>
            <!-- End calendar -->
        </div>
    </main>

@endsection