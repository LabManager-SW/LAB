@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <h2 class="text-left">피험자 마이페이지</h2>
            <div class="row">
                <div class="col-md-12">
                    <h3 style="margin-top: 70px;">신청 목록</h3>
                    <div class="table-responsive btn-spacing">
                        <table id="mytable" class="table table-bordred table-striped">
                            <tr>
                                <thead>
                                <th><input type="checkbox" id="checkall"/></th>
                                <th>No.</th>
                                <th>실험명</th>
                                <th>위치(대학교)</th>
                                <th>연구원 연락처</th>
                                <th>날짜</th>
                                <th>신청취소</th>
                                </thead>
                            </tr>
                            <tbody>
                            @forelse($data as $value)
                                <tr>
                                    <td><input type="checkbox" class="checkthis"/></td>
                                    <td>{{$value->id}}</td>
                                    <td onclick="location.href='/user_mypage/{{$value->id}}'"
                                        style="cursor:pointer;">{{$value->name}}</td>
                                    <td>{{$value->location}}</td>
                                    <td>@foreach(\Illuminate\Support\Facades\DB::table('testers')->where('id', $value->tester_id)->get() as $tester)
                                            {{$tester->phone}}
                                        @endforeach</td>
                                    <td>{{$value->datetime}}</td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Delete"
                                           onclick="deleting({{$value->id}})">
                                            <button class="btn btn-danger btn-xs" data-title="Delete"
                                                    data-toggle="modal" data-target="#delete"><span
                                                        class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </p>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td><input type="checkbox" class="checkthis"/></td>
                                    <td>없음.</td>
                                    <td>없음.</td>
                                    <td>없음.</td>
                                    <td>없음.</td>
                                    <td></td>
                                    <td>
                                        X
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                        @if($data->count())
                            <div class="text-center" style="text-align:right!important;">
                                {!! $data->render() !!}
                            </div>
                        @endif
                    </div>
                    <div class="text-right">
                    </div>
                    <div class="text-right">
                        <a href="index.blade.php"><input type="submit" class="btn btn-primary" name="mainpage"
                                                         value="메인페이지로"></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function deleting(id) {
            $('div.id');
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'delete',
                    url: '/user_mypage/delete/' + id
                }).success(function () {
                    window.location.href = '/user_mypage/';
                })
            }
        }
    </script>
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
