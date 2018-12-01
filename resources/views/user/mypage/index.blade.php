@extends('layouts.app')
@section('content')
    <main id="main-container">
        <div class="container logo_spacing">
            <h2 class="text-left">피험자 마이페이지</h2>
            <div class="row">
                <div class="col-md-12">
                    <h3 style="margin-top: 70px;">신청 목록</h3>
                    <div class="table-responsive btn-spacing">
                        <table id="mytable" class="table table-bordred table-striped">
                            <tr>
                                <thead>
                                <th><input type="checkbox" id="checkall"/></th>
                                <th>No.</th>
                                <th>실험명</th>
                                <th>위치(대학교)</th>
                                <th>연구원 연락처</th>
                                <th>날짜</th>
                                <th>신청취소</th>
                                </thead>
                            </tr>
                            <tbody>

                            @forelse($data as $value)
                                <tr>
                                    <td><input type="checkbox" class="checkthis"/></td>
                                    <td>1</td>
                                    <td>청각 실험</td>
                                    <td>한양대학교</td>
                                    <td>010-0000-0000</td>
                                    <td>2018.11.30</td>
                                    <td>
                                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete"
                                                    data-toggle="modal"
                                                    data-target="#delete"><span
                                                        class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </p>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td><input type="checkbox" class="checkthis"/></td>
                                    <td>없음.</td>
                                    <td>없음.</td>
                                    <td>없음.</td>
                                    <td>없음.</td>
                                    <td></td>
                                    <td>
                                        X
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="clearfix"></div>
                        <ul class="pagination pull-right">
                            <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                        </ul>
                    </div>
                    <div class="text-right">
                        <a href="index.blade.php"><input type="submit" class="btn btn-primary" name="mainpage"
                                                         value="메인페이지로"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                    class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                    </div>
                    <div class="modal-body">

                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you
                            sure you want to delete this Record?
                        </div>

                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Yes
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                    class="glyphicon glyphicon-remove"></span> No
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#mytable #checkall").click(function () {
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });

            $("[data-toggle=tooltip]").tooltip();
        });
    </script>
@endsection
