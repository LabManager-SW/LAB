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
                        @forelse($calendar as $value)
                    {
                        title: '실험명: {{$value['name']}} 일자:{{$value['datetime']}}',
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
                    @empty
                    @endforelse
                ]
            });
        });
    </script>
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center"><h3 style="margin-bottom: 50px;">실험일정 추가 및 공고</h3></div>
            <!-- calendar -->
            <div class="col-md-6">
                <h4>실험명: {{$data->name}}</h4><!--클릭한 데이터가 넘어와야 됨-->
                <div class="btn-spgacing"></div>
                <div id='calendar'></div>
            </div>
            <!-- End calendar -->
            <!-- 실험정보 -->
            <div class="col-md-6">
                <form name="details" id="details" action="{{route('admin.experiment_details.store')}}" method="POST"
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
                        <label for="required_applicant">피실험자 필요 인원 수</label>
                        <input type="number" id="required_applicant" name="required_applicant" class="form-control">
                        @if ($errors->has('required_applicant'))
                            <div class="help-block">
                                {{ $errors->first('required_applicant') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="payment">피실험자 수당</label>
                        <input type="text" id="payment" name="payment" class="form-control">
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
                        <label for="end_recruit_date">공고 모집 마감일</label>
                        <input type="datetime-local" id="end_recruit_date" name="end_recruit_date" class="form-control">
                        @if ($errors->has('end_recruit_date'))
                            <div class="help-block">
                                {{ $errors->first('end_recruit_date') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="datetime">실험 날짜 및 시간</label>
                        <input type="datetime-local" id="datetime" name="datetime" class="form-control">
                        @if ($errors->has('datetime'))
                            <div class="help-block">
                                {{ $errors->first('datetime') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="hidden" id="experiment_id" name="experiment_id" class="form-control"
                               value="{{$data->id}}">
                        <input type="hidden" id="name" name="name" class="form-control" value="{{$data->name}}">
                        <input type="hidden" id="poa" name="poa" class="form-control" value="{{$data->poa}}">
                        <input type="hidden" id="background" name="background" class="form-control"
                               value="{{$data->background}}">
                        <input type="hidden" id="tester_name" name="tester_name" class="form-control"
                               value="{{$data->tester_name}}">
                    </div>

                    <div class="text-right btn-spacing">
                        <input type="submit" form="details" class="btn btn-primary" value="등록하기">
                        <div onclick="location.href='/admin/experiment_details/{{$data->id}}'" name="back"
                             id="back" class="btn btn-primary">
                            이전페이지
                        </div>
                    </div>
                    <!-- End 실험정보 -->
                </form>
            </div>
        </div>
    </main>

@endsection
