@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <!-- 실험정보 -->
            <h3 class="text-left">{{$value->univ}} {{$value->dept}}연구실</h3>
            <div class="col-md-12">
                <h4 class="btn-spacing">실험명: OOOOO</h4>
                <div class="form-group">
                    <label for="poa">실험 목표 및 내용</label>
                    <input type="text" id="poa" class="form-control" value="{{$value->poa}}" disabled>
                </div>
                <div class="form-group">
                    <label for="health_condition">피실험자 자격</label>
                    <input type="text" id="health_condition" class="form-control" value="{{$value->health_condition}}" disabled>
                </div>
                <div class="form-group">
                    <label for="location">실험 장소</label>
                    <input type="text" id="location" class="form-control" value="{{$value->location}}" disabled>
                </div>
                <div class="form-group">
                    <label for="time_taken">소요시간</label>
                    <input type="text" id="time_taken" class="form-control" value="{{$value->time_taken}}" disabled>
                </div>
                <div class="form-group">
                    <label for="payment">피실험자 수당</label>
                    <input type="text" id="payment" class="form-control" value="{{$value->payment}}" disabled>
                </div>
                <div class="form-group">
                    <label for="method_desc">실험방법 설명</label>
                    <input type="text" id="method_desc" class="form-control" value="{{$value->method_desc}}" disabled>
                </div>
                <div class="form-group">
                    <label for="tester_name">담당 연구원</label>
                    <input type="text" id="tester_name" class="form-control" value="{{$tester->name}}" disabled>
                </div>
                <div class="form-group">
                    <label for="tester_email">담당 연구원 이메일</label>
                    <input type="email" id="tester_email" class="form-control" value="{{$tester->email}}" disabled>
                </div>
                <div class="form-group">
                    <label for="tester_phone">담당 연구원 연락처</label>
                    <input type="email" id="tester_phone" class="form-control" value="{{$tester->phone}}" disabled>
                </div>
            </div>
            <!-- End 실험정보 -->
        </div>
    </main>
@endsection