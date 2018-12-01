@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <!-- 실험정보 -->
            <h3 class="text-left">OO대학교 OO연구실</h3>
            <div class="col-md-6">
                <h4 class="btn-spacing">실험명: OOOOO</h4>
                <form name="" onsubmit="" action="" method="post">
                    <div class="form-group">
                        <label>실험 목표 및 내용</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>피실험자 자격</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>실험 장소</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>소요시간</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>피실험자 수당</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>실험방법 설명</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>담당 연구원</label>
                        <input type="text" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>담당 연구원 이메일</label>
                        <input type="email" id="" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>담당 연구원 연락처</label>
                        <input type="email" id="" class="form-control" value="">
                    </div>
                </form>
            </div>
            <!-- End 실험정보 -->
            <!-- calendar -->
            <div class="col-md-6">
                <div id='calendar'></div>
                <div class="text-right btn-spacing">
                    <input type="submit" name="apply" id="apply" class="btn btn-primary" value="지원하기">
                    <a href="index.blade.php"><input type="submit" name="mainpage" id="mainpage" class="btn btn-primary"
                                                     value="메인페이지로"></a>
                </div>
            </div>
            <!-- End calendar -->
        </div>
    </main>
@endsection

@section('script')
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
                defaultDate: '2018-11-30', lang: 'ko',
                editable: true,

                <!--Event Section-->
                eventLimit: true, // allow "more" link when too many events
                // 여기서 PHP 코드로 값 불러와서 작성가능, 아래는 예시로 넣어 놓은 것들
                events: [
                    {
                        title: 'All Day Event',
                        start: '2018-11-01'
                    },
                    {
                        title: 'Long Event',
                        start: '2018-11-03',
                        end: '2018-11-10'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-11-09T16:00:00'
                    },
                    {
                        id: 999,
                        title: 'Repeating Event',
                        start: '2018-11-16T16:00:00'
                    },
                    {
                        title: 'Conference',
                        start: '2018-11-11',
                        end: '2015-02-13'
                    },
                    {
                        title: 'Click for Google',
                        url: 'http://google.com/',
                        start: '2018-11-28'
                    }
                ]
            });
        });
    </script>
@endsection