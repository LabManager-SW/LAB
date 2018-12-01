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
                <ul class="btn-spacing list-group">
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                </ul>
            </div>
            <div class="btn-spacing">
                <input type="submit" value="실시간 모집 현황" class="btn btn-success">
                <input type="submit" value="급여순서로 보기" class="btn btn-secondary">
                <input type="submit" value="등록마감일 순으로 보기" class="btn btn-secondary">
                <input type="submit" value="지역별로 보기" class="btn btn-secondary">
                <ul class="btn-spacing list-group">
                    <li class="list-group-item">연구원이 등록한 실험 정보</li><!--클릭 시 -->
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                    <li class="list-group-item">연구원이 등록한 실험 정보</li>
                </ul>
            </div>
        </div>
    </main>
@endsection
