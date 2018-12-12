@extends('layouts.app')
@section('content')
    <<<<<<< HEAD
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
                        <input type="text" class="form-control" placeholder="대학교, 실험이름 등으로 검색">
                        <span class="input-group-addon">
                  <button type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
                    </div>
                </div>
            </div>
            <div class="table-responsive btn-spacing">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                    <th>번호</th>
                    <th>실험명</th>
                    <th>위치</th>
                    <th>수당</th>
                    <th>날짜</th>
                    </thead>
                    <tbody>
                    @forelse($data as $value)
                        <tr style="cursor:pointer;" onclick="location.href='/user_home/{{$value->id}}'">
                            <td class="td1">{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->location}}</td>
                            <td>{{$value->payment}}</td>
                            <td>{{$value->datetime}}}</td>
                        </tr>
                    @empty
                        <td colspan="4">해당 글이 없습니다.</td>
                    @endforelse
                    </tbody>
                </table>
                @if($data->count())
                    <div class="text-center">
                        {!! $data->render() !!}
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
