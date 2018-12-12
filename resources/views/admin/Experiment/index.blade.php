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
    <style>
        .options {
            display: none;
        }
        .options:hover{
            background-color: lightgrey;
        }

        .selecting:hover .options {
            display: block !important;
        }
    </style>
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
                <div class="btn-spacing selecting">
                    <div class="js-select2 form-control select2-hidden-accessible" id="new_experiment"
                         style="width: 100%;" data-placeholder="" tabindex="-1"
                         aria-hidden="true">
                        <div>실험 선택</div>
                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        <div class="options" style="cursor:pointer; padding:1vw;">
                            @foreach($experiment as $value)
                                <div onclick="location.href='/admin/experiment_details/{{$value->id}}'">{{$value->name}}</div>
                            @endforeach
                        </div>
                    </div>
                    <span class="select2 select2-container select2-container--default select2-container--below"
                          dir="ltr" style="width: 100%;"><span class="selection"><span
                                    class="select2-selection select2-selection--single" role="combobox"
                                    aria-haspopup="true" aria-expanded="false" tabindex="0"
                                    aria-labelledby="select2-example-select2-container"><span
                                        class="select2-selection__rendered"
                                        id="select2-example-select2-container"></span><span
                                        class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span
                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <div class="text-center btn-spacing">
                    <button type="button" class="btn btn-primary"
                            onclick="location.href='{{url('/admin/experiment/create')}}'">새로운 실험 추가
                    </button>
                </div>
            </div>            <!-- End 실험정보 -->
        </div>
    </main>
@endsection
