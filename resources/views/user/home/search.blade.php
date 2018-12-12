@extends('layouts.app')
@section('content')
    <style>
        table, th, td {
            text-align: center;
        }

        table {
            width: 100%;
        }

        td {
            padding: 1vw;
        }
    </style>
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="row">
                <div class="col-xs-8">
                    <div class="input-group stylish-input-group">
                        <form action="/search/" method="GET" id="search">
                            <input type="search" name="search" class="form-control" placeholder="대학교, 실험이름 등으로 검색">
                        </form>
                        <span class="input-group-addon">
                                <button type="submit" form="search">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive btn-spacing">
                <div><b style="font-style: italic">{{$requests}}</b>에 대한 검색 결과입니다.</div>
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>번호</th>
                    <th>실험명</th>
                    <th>위치</th>
                    <th>수당</th>
                    <th>추진 배경</th>
                    <th>소요 시간</th>
                    <th>담당 연구원</th>
                    <th>실험 방법</th>
                    <th>신체 조건</th>
                    <th>날짜</th>
                    </thead>
                    <tbody>
                    @forelse($details as $value)
                        <tr style="cursor:pointer;" onclick="location.href='/user_home/{{$value->id}}'">
                            <td class="td1">{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->location}}</td>
                            <td>{{$value->payment}}</td>
                            <td>{{$value->background}}</td>
                            <td>{{$value->time_taken}}</td>
                            <td>{{$value->tester_name}}</td>
                            <td>{{$value->method_desc}}</td>
                            <td>{{$value->health_condition}}</td>
                            <td>{{$value->datetime}}</td>
                        </tr>
                    @empty
                        <td colspan="4">해당 글이 없습니다.</td>
                    @endforelse
                    </tbody>
                </table>
                @if($details->count())
                    <div class="text-center">
                        {!! $details->render() !!}
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection