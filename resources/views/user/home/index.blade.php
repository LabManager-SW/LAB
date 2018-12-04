@extends('layouts.app')
@section('content')
    @if(session('success'))
        <span class="alert alert-success" role="alert">
         <strong>{{ session('success') }}</strong>
     </span>
    @endif
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
            <div class="btn-spacing">
                <input type="submit" value="마감 임박" class="btn btn-success">
                <ul class="btn-spacing list-group">
                    @forelse($data as $value)
                        <li class="list-group-item" onclick="location.href='/user_home/{{$value->id}}'" style="cursor:pointer;">
                            <div>
                                {{\Illuminate\Support\Facades\DB::table('testers')->where('id', $value->tester_id)->value('univ')}}
                                {{\Illuminate\Support\Facades\DB::table('testers')->where('id', $value->tester_id)->value('dept')}}
                            </div>
                            <div>
                                {{$value->payment}}, {{$value->datetime}}, {{$value->name}}
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">없음.</li>
                    @endforelse
                </ul>
            </div>
            <div class="btn-spacing">
                <input type="submit" value="실시간 모집 현황" class="btn btn-success">
                <input type="submit" value="급여순서로 보기" class="btn btn-secondary">
                <input type="submit" value="등록마감일 순으로 보기" class="btn btn-secondary">
                <input type="submit" value="지역별로 보기" class="btn btn-secondary">
                <ul class="btn-spacing list-group">
                    @forelse($data as $value)
                        <li class="list-group-item">실험 명 : {{$value->name}}</li>
                    @empty
                        <li class="list-group-item">없음.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </main>
@endsection
