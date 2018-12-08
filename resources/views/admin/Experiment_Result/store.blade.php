@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center">
                <h3 style="margin-bottom: 50px;">
                    실험데이터 기록하기
                </h3>
            </div>
            <h4>실험명: OOOOO</h4>
            <p></p>
            <span>피험자: OOO</span><br>
            <span>실험일자: OO월 OO일</span>

            <div class="form-group btn-spacing">
                <label>실험 특이사항</label>
                <input type="text" id="" class="form-control" value="" placeholder="내용을 입력해주세요.">
            </div>
            <label>실험 결과 업로드</label>
            <div class="input-group">
        <span class="input-group-btn">
          <button id="fake-file-button-browse" type="button" class="btn btn-black">
            <span class="glyphicon glyphicon-file"></span>
          </button>
        </span>
                <input type="file" id="files-input-upload" style="display:none">
                <input type="text" id="fake-file-input-name" disabled="disabled" placeholder="File not selected"
                       class="form-control">
                <span class="input-group-btn">
          <button type="button" class="btn btn-default" disabled="disabled" id="fake-file-button-upload">
            <span class="glyphicon glyphicon-upload"></span>
          </button>
        </span>
            </div>
            <div class="btn-spacing">
                <input type="button" onclick="" name="complete" id="complete" class="btn btn-primary" value="입력완료">
                <input type="button" onclick="history.go(-1);" name="back" id="back" class="btn btn-primary"
                       value="이전페이지" style="margin-left: 100px;">
            </div>

            <!-- End table, 실험결과 데이터파일 다운받기 -->
        </div>
    </main>
@endsection
@section('script')
    <script>
        document.getElementById('fake-file-button-browse').addEventListener('click', function () {
            document.getElementById('files-input-upload').click();
        });

        document.getElementById('files-input-upload').addEventListener('change', function () {
            document.getElementById('fake-file-input-name').value = this.value;

            document.getElementById('fake-file-button-upload').removeAttribute('disabled');
        });
    </script>
@endsection
