@extends('layouts.app')
@section('content')

<main id="main-container">
    <!-- Header -->
    <div id ="page-container" class="header-navbar-fixed">
        <header id="header-navbar" class="content-mini content-mini-full remove-padding">
          <div class="text-center logo_position">
            <a href="user-index.html"><img src="../static/assets/img/img-logo.png" class="logo_size"></a>
        </div>
        <ul class="nav-header pull-right" style="position: absolute; right: 0; top: 20px;">
            <li>
              <button id="mobile-slideBt" type="button" class="btn btn-default navbar-toggle hidden-md hidden-lg btn_size" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-navicon fa-2x"></i>
            </button>
        </li>
    </ul>
    <div id="header_interval" class="navbar-collapse navbar-main-collapse collapse header_spacing" style="height: 1px;">
        <div id = "active_event_1">
          <ul id="ul_interval" class="ul_list remove-padding">
            <li class="li_list active">
              <a href="user-index.html" class="sliding-link">        
                Main                     
            </a>
        </li>
        <li class="li_list">
          <a href="index.html" class="sliding-link">
            로그아웃                
        </a>
    </li>
    <li class="li_list">
      <a href="user-mypage.html" class="sliding-link">
        마이페이지
    </a> 
</li>
</ul>
<ul class="ul_arrow_list remove-padding row remove-margin-b">
    <li class="arrow_menu">
      <a href="#">
        <span class="arrow_up arrow_up_position"></span>
    </a>
</li>
</ul>
</div>
</div>
</header>
<div class="header_bg"></div>
</div>
<!-- END Header -->

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
           <th>주관 대학</th>
           <th>주관 학부</th>
           <th>날짜</th>
       </thead>
       <tbody>
        @forelse($data as $value)
        <tr style="cursor:pointer;" onclick="location.href='/user_home/{{$value->id}}'">
            <td class="td1">{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->location}}</td>
            <td>{{$value->payment}}</td>
            <td>{{\Illuminate\Support\Facades\DB::table('testers')->where('id', $value->tester_id)->value('univ')}}</td>
            <td>{{\Illuminate\Support\Facades\DB::table('testers')->where('id', $value->tester_id)->value('dept')}}</td>
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