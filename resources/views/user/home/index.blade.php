@extends('layouts.app')
@section('content')
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
        <div class="row">
          @forelse($data as $value)
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" onclick="location.href='/user_home/{{$value->id}}'" style="cursor:pointer;">
            <div class="box-part text-left">
              <span><h4>                                
                {{\Illuminate\Support\Facades\DB::table('testers')->where('id', $value->tester_id)->value('univ')}}
                {{\Illuminate\Support\Facades\DB::table('testers')->where('id', $value->tester_id)->value('dept')}}</h4></span>
                <div class="text">
                </div>
                <span> {{$value->payment}}, {{$value->datetime}}, {{$value->name}}</span>
            </div>
        </div>   
    </div>
    @empty
    <div>
        없음.
    </div> 
    @endforelse   
</div>
<div class="btn-spacing">
    <input type="submit" value="실시간 현황" class="btn btn-success">
    <input type="submit" value="급여순" class="btn btn-secondary">
    <input type="submit" value="등록마감 순" class="btn btn-secondary">
    <input type="submit" value="지역별" class="btn btn-secondary">
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
