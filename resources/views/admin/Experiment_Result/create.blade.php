@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <div class="text-center">
                <h3 style="margin-bottom: 50px;">
                    실험데이터 기록하기
                </h3>
            </div>
            <h4>실험명: {{$experiment->name}}</h4>
            <p></p>
            <span>피험자: {{$participant->name}}</span>
            @if ($errors->has('datetime'))
                <div class="help-block">
                    {{ $errors->first('datetime') }}
                </div>
            @endif
            <form id="result" method="POST" name="result" action="{{route('admin.result.store')}}"
                  enctype="multipart/form-data">
                {!!csrf_field()!!}
                <div class="form-group btn-spacing">
                    <label>실험 일자</label>
                    <input type="datetime" name="datetime" id="datetime" form="result"
                           value="{{$experiment->datetime}}">
                    @if ($errors->has('datetime'))
                        <div class="help-block">
                            {{ $errors->first('datetime') }}
                        </div>
                    @endif
                    <input type="hidden" name="experiment_id" value="{{$experiment->id}}">
                    <input type="hidden" name="participant_id" value="{{$participant->id}}">
                </div>
                <div class="form-group btn-spacing">
                    <label>실험 특이사항</label>
                    <input type="text" id="remark" name="remark" class="form-control" placeholder="내용을 입력해주세요.">
                    @if ($errors->has('remark'))
                        <div class="help-block">
                            {{ $errors->first('remark') }}
                        </div>
                    @endif
                    <input type="hidden" name="experiment_id" value="{{$experiment->id}}">
                </div>
                <div class="form-group btn-spacing">
                <label for="file">실험 결과 업로드</label>
                <input type="file" id="file" name="file" class="image"
                       value="{{ old('file') }}">
                @if ($errors->has('file'))
                    <div class="help-block">
                        {{ $errors->first('file') }}
                    </div>
                @endif
                </div>
                <div class="btn-spacing">
                    <input type="submit" form="result" name="complete" id="complete" class="btn btn-primary"
                           value="입력완료">
                    <div onclick="history.go(-1);" class="btn btn-primary" style="margin-left: 100px;">이전페이지</div>
                </div>
            </form>

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
