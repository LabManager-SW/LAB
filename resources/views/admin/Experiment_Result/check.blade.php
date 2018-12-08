@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center">
                <h3 style="margin-bottom: 50px;">
                    실험데이터 조회하기
                </h3>
            </div>
            <!-- table, 실험결과 데이터파일 다운받기 -->
            <div class="col-xs-12">
                <h4>실험명: OOOOO</h4><!--클릭한 데이터가 넘어와야 됨-->
                <div class="table-responsive btn-spacing">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>이름</th>
                        <th>성별</th>
                        <th>나이</th>
                        <th>이메일</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>하동수</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6 table-responsive btn-spacing">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>실험 특이사항</th>
                    <th>실험날짜</th>
                    <th><input type="checkbox" id="checkall"></th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>하동수</td>
                        <td></td>
                        <td><input type="checkbox" class="checkthis"></td>
                    </tr>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </div>

            <div class="col-md-6 btn-spacing">
                <img src="../static/assets/img/download.png">
                &nbsp;실험결과 데이터파일 다운받기
            </div>
            <div class="text-right btn-spacing">
                <input type="button" onclick="history.go(-1);" name="back" id="back" class="btn btn-primary"
                       value="이전페이지">
            </div>

            <!-- End table, 실험결과 데이터파일 다운받기 -->
        </div>
    </main>
@endsection
@section('script')
<script>

    $(document).ready(function () {
        $("#mytable #checkall").click(function () {
            if ($("#mytable #checkall").is(':checked')) {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", true);
                });

            } else {
                $("#mytable input[type=checkbox]").each(function () {
                    $(this).prop("checked", false);
                });
            }
        });

        $("[data-toggle=tooltip]").tooltip();
    });

</script>
@endsection