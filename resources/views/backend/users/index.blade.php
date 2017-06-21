@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>ユーザー管理　＞　一覧</h3>
                <div class="col-md-6 page-right mar">
                    <div class="col-md-6 page-right mar"></div>
                </div>

                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">氏名</td>
                        <td>
                            {!! Form::open( ['method' => 'get', 'route' => 'backend.users.index', 'enctype'=>'multipart/form-data']) !!}
                            <input name="keyword" type="text" id="keyword_id" class="form-control form-control--small" value="{{ $keyword }}">
                            <input type="hidden" name="keyword_id" id="keyword_id-id" value="{{ $keyword_id }}">
                            　　　
                            <select name="s_u_power" class="form-control form-control--small mar-left10" style="padding-top:2px;">
                                <option value="10" @if($s_u_power == 10) selected @endif>管理者 </option>
                                <option value="20" @if($s_u_power == 20) selected @endif>技工士</option>
                                <option value="30" @if($s_u_power == 30) selected @endif>事務</option>
                                <option value="40" @if($s_u_power == 40) selected @endif>経営者１</option>
                                <option value="50" @if($s_u_power == 50) selected @endif>経営者２</option>
                                <option value="60" @if($s_u_power == 60) selected @endif>技工事務</option>
                                <option value="70" @if($s_u_power == 70) selected @endif>オーソ職員</option>
                                　</select>

                            <input value="検索" type="submit" class="btn btn-sm btn-page  mar-left10">
                            </form>
                        </td>
                    </tr>
                    </tbody></table>
                <input value="新規登録" onclick="location.href='{{ route('backend.users.regist') }}'" type="button" class="btn btn-sm btn-page">



                <table class="table table-bordered table-striped treatment2-list">
                    <tbody><tr>
                        <td align="center" class="col-title">権限</td>
                        <td align="center" class="col-title">氏名</td>
                        <td align="center" class="col-title">カタカナ</td>
                        <td align="center" class="col-title" style="width:5%;">退職日</td>
                        <td align="center" class="col-title col-action">詳細</td>
                    </tr>

                    @if ( !empty($users) && count($users) > 0 )
                        @foreach ( $users as $user )
                            <tr>
                                <td>
                                    <?php
                                    switch ( $user->u_power ) {
                                        case 10:
                                            echo '管理者';
                                            break;
                                        case 20:
                                            echo '技工士';
                                            break;
                                        case 30:
                                            echo '事務';
                                            break;
                                        case 40:
                                            echo '経営者１';
                                            break;
                                        case 50:
                                            echo '経営者２';
                                            break;
                                        case 60:
                                            echo '技工事務';
                                            break;
                                        case 70:
                                            echo 'オーソ職員';
                                            break;
                                        default:
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>{{ $user->u_f_name }}　{{ $user->u_g_name }}</td>
                                <td>{{ $user->u_f_name_kana }}　{{ $user->u_g_name_kana }}</td>
                                <td>{{ date('Y/m/d', strtotime($user->u_quit_day)) }}</td>
                                <td align="center"><input value="詳細" onclick="location.href='{{ route('backend.users.detail', $user->u_id) }}'" type="button" class="btn btn-sm btn-page"></td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>

                @if ( count($users) > 0 && !empty($users) )
                <div class="row">
                    <div class="col-md-12 text-center pagination">
                        @if ( $page > 1 )
                            <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='{{ route('backend.users.index', ['page' => $page - 1, 'keyword' => $keyword, 'keyword_id' => $keyword_id, 's_u_power' => $s_u_power]) }}'">&lt; 前の30件</button>&ensp;&ensp;&ensp;
                        @endif
                        @if ( $page < $totalPage )
                            <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='{{ route('backend.users.index', ['page' => $page + 1, 'keyword' => $keyword, 'keyword_id' => $keyword_id, 's_u_power' => $s_u_power]) }}'">次の30件 &gt;</button>
                        @endif
                    </div>
                </div>
                @endif

                <div class="row margin-bottom">
                    <div class="col-md-12 text-center"></div>
                </div>
                <!-- End content out tech list -->

            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->

    <script>
        $(document).ready(function() {
            $("#keyword_id").autocomplete({
                minLength: 0,
                // source: pamphlets,
                source: function (request, response) {
                    var key = $('#keyword_id').val();
                    $.ajax({
                        url: "{{ route('backend.users.autocomplete.users.name') }}",
                        beforeSend: function () {
                            // console.log(response);
                        },
                        async: true,
                        data: {key: key},
                        dataType: "json",
                        method: "get",
                        // success: response
                        success: function (data) {
                            // console.log(data);
                            response(data);
                        },
                    });
                },
                focus: function (event, ui) {
                    $("#keyword_id").val(ui.item.label);
                    return false;
                },
                select: function (event, ui) {
                    $("#keyword_id").val(ui.item.label);
                    $("#keyword_id-id").val(ui.item.value);
                    // $( "#keyword_id-description" ).html( ui.item.desc );
                    return false;
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>")
                //.append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
                    .append("<a>" + item.desc + "</a>")
                    .appendTo(ul);
            };
        });
    </script>

@endsection  