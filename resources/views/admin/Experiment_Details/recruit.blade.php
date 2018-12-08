@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="../static/assets/js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css">
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center"><h3 style="margin-bottom: 50px;">실험일정 추가 및 공고</h3></div>
            <!-- calendar -->
            <div class="col-md-6">
                <h4>실험명: OOOOO</h4><!--클릭한 데이터가 넘어와야 됨-->
                <div class="btn-spacing"></div>
                <div id='calendar'></div>
            </div>
            <!-- End calendar -->
            <!-- 실험정보 -->
            <div class="col-md-6">
                <form name="" onsubmit="" action="" method="post">
                    <div class="form-group btn-spacing">
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
                        <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" placeholder="날짜, 시간 선택">
                            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
                        </div>
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
    <script>
        $(function () {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
@endsection