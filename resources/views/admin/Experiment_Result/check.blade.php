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
                <h4>실험명: {{$participant->exp_name}}</h4><!--클릭한 데이터가 넘어와야 됨-->
                <div class="table-responsive btn-spacing">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>이름</th>
                        <th>성별</th>
                        <th>생년월일</th>
                        <th>이메일</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->gender}}</td>
                            <td>{{$user->birth}}</td>
                            <td>{{$user->email}}</td>
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
                    <th>등록일</th>
                    <th style="text-align: center;">자료</th>
                    </thead>
                    <tbody>
                    @forelse($data as $value)
                        <tr>
                            <td>{{$value->remark}}</td>
                            <td>{{$value->datetime}}</td>
                            <td>{{$value->created_at}}</td>
                            <td><a href="{{url('/admin/result/download/'.$value->id)}}"><div class="btn btn-primary" >다운로드</div></a></td>
                        </tr>
                        @empty
                        <tr>
                            <td>없음.</td>
                            <td>없음.</td>
                            <td></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                @if($data->count())
                    <div class="text-center">
                        {!! $data->render() !!}
                    </div>
                @endif
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