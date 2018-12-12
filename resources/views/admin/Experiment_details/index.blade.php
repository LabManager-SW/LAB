@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center">
                <h3 style="margin-bottom: 20px;">
                    실험별 데이터
                </h3>
            </div>
            <!-- table, 실험결과 데이터파일 다운받기 -->
            <div>
                <h4>실험명: {{$data->name}}</h4><!--클릭한 데이터가 넘어와야 됨-->
                <div class="btn-spacing"></div>
                <div class="btn btn-secondary" onclick="location.href='/admin/experiment_details/create/{{$data->id}}'">
                    실험 일정 추가 및 공고
                </div>
                <div class="table-responsive btn-spacing">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <tr>
                            <th>실험명</th>
                            <th>실험계획</th>
                            <th>담당 연구원</th>
                            <th>실험추진배경</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->poa}}</td>
                            <td>{{$data->tester_name}}</td>
                            <td>{{$data->background}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 table-responsive btn-spacing">
                <div style="width: 80%;">
                    <div class="input-group stylish-input-group">
                        <form action="/admin/t_search/{{$data->id}}" method="GET" id="tbd_search">
                            <input type="search" name="search" class="form-control" placeholder="실험 예정된 피험자 검색">
                            <input type="hidden" name="classification" value="TBD">
                            <input type="hidden" name="exp_id" value="{{$data->id}}">
                        </form>
                        <span class="input-group-addon"><button type="submit" form="tbd_search"><span
                                        class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>실험 날짜</th>
                        <th>피험자</th>
                        <th>기록</th>
                        <th>삭제</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @forelse($tbd_participants as $value)
                            <td>{{$value->id}}</td>
                            <td>{{$value->datetime}}</td>
                            <td>{{$value->name}}</td>
                            <td style="cursor:pointer;" onclick="location.href='/admin/result/create/{{$value->id}}'">
                                <div class="btn btn-primary">기록하기</div>
                            </td>
                            <td style="cursor:pointer;" onclick="deletinguser({{$value->id}})">
                                <button class="btn btn-danger">삭제</button>
                            </td>
                        @empty
                            <td>없음.</td>
                            <td>입력값 없음</td>
                            <td>없음</td>
                            <td>없음</td>
                            <td>없음</td>
                        @endforelse
                    </tr>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                @if($tbd_participants->count())
                    <div class="text-center">
                        {!! $tbd_participants->render() !!}
                    </div>
                @endif
            </div>

            <div class="col-md-6 table-responsive btn-spacing">
                <div style="width: 80%;">
                    <div class="input-group stylish-input-group">
                        <form action="/admin/c_search/{{$data->id}}" method="GET" id="cw_search">
                            <input type="search" name="search" class="form-control" placeholder="실험 완료 피험자 검색">
                            <input type="hidden" name="classification" value="CW">
                            <input type="hidden" name="exp_id" value="{{$data->id}}">
                        </form>
                        <span class="input-group-addon"><button type="submit" form="cw_search"><span
                                        class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>
                <table id="mytable" class="table table-bordred table-striped">
                    <caption>실험 완료 피험자</caption>
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>실험 날짜</th>
                        <th>피험자</th>
                        <th>조회</th>
                        <th>삭제</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @forelse($cw_participants as $value)
                            <td>{{$value->id}}</td>
                            <td>{{$value->datetime}}</td>
                            <td>{{$value->name}}</td>
                            <td>
                                <div class="btn btn-primary" onclick="location.href='/admin/result/{{$value->id}}'"
                                     style="cursor:pointer;">조회
                                </div>
                            </td>
                            <td style="cursor:pointer;" onclick="deletingresult({{$value->id}})">
                                <button class="btn btn-danger">삭제</button>
                            </td>
                        @empty
                            <td>없음.</td>
                            <td>입력값 없음</td>
                            <td>없음</td>
                        @endforelse
                    </tr>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                @if($cw_participants->count())
                    <div class="text-center">
                        {!! $cw_participants->render() !!}
                    </div>
                @endif
            </div>

            <!-- End table, 실험결과 데이터파일 다운받기 -->
        </div>
    </main>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deletingresult(id) {
            $('div.id');
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/result/' + id
                }).then(function () {
                    window.location.href = '/admin/experiment_details/{{$data['id']}}';
                })
            }
        }

        function deletinguser(id) {
            $('div.id');
            if (confirm('글을 삭제합니다.')) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/result_user/' + id
                }).then(function () {
                    window.location.href = '/admin/experiment_details/{{$data['id']}}';
                })
            }

        }
    </script>
@endsection