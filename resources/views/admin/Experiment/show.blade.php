@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center">
                <h3 style="margin-bottom: 50px;">
                    실험별 데이터
                </h3>
            </div>
            <!-- table, 실험결과 데이터파일 다운받기 -->
            <div>
                <h4>실험명: OOOOO</h4><!--클릭한 데이터가 넘어와야 됨-->
                <div class="btn-spacing"></div>
                <a href="recruit.blade.php"><input type="button" onclick="" name="back" id="back"
                                                   class="btn btn-secondary"
                                                   value="실험 일정 추가 및 공고"></a>
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
                            <td>OOO</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6 table-responsive btn-spacing">
                <table id="mytable" class="table table-bordred table-striped">
                    <caption class="caption-color">실험예정 피험자 목록<a href="../Experiment_Result/create.blade.php">
                            <input type="button" onclick="" name="write" id="write"
                                   class="btn btn-secondary caption-button"
                                   value="실험데이터 기록하기"></a>
                    </caption>
                    <thead>
                    <tr>
                        <th></th>
                        <th>No.</th>
                        <th>실험 날짜</th>
                        <th>피험자</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox" class="checkthis"></td>
                        <td>1</td>
                        <td>OO/OO</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <ul class="pagination">
                    <li style="width: 50%;">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" placeholder="피험자 이름">
                            <span class="input-group-addon">
                    <button type="submit">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>  
                  </span>
                        </div>
                    </li>
                    <li><input type="button" onclick="" name="delete" id="delete" class="btn btn-secondary" value="삭제">
                    </li>
                </ul>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </div>

            <div class="col-md-6 table-responsive btn-spacing">
                <table id="mytable" class="table table-bordred table-striped">
                    <caption class="caption-color">실험완료 피험자 목록<a href="../Experiment_Result/check.blade.php"><input
                                    type="button" onclick=""
                                    name="write" id="write"
                                    class="btn btn-secondary caption-button"
                                    value="실험데이터 조회하기"></a>
                    </caption>
                    <thead>
                    <tr>
                        <th></th>
                        <th>No.</th>
                        <th>실험 날짜</th>
                        <th>피험자</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox" class="checkthis"></td>
                        <td>1</td>
                        <td>OO/OO</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
                <div class="clearfix"></div>
                <ul class="pagination">
                    <li style="width: 50%;">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" placeholder="피험자 이름, 실험특이사항">
                            <span class="input-group-addon">
                        <button type="submit">
                          <span class="glyphicon glyphicon-search"></span>
                        </button>  
                      </span>
                        </div>
                    </li>
                </ul>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </div>

            <!-- End table, 실험결과 데이터파일 다운받기 -->
        </div>
    </main>

@endsection