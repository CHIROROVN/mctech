@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>ユーザー管理　＞　　登録完了</h3>
                <p>以上の内容で登録完了しました。</p>
                <table width="80%" class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td width="17%" class="col-title">氏名</td>
                        <td colspan="7">
                            {{ @Session::get('dataInputs')['u_f_name'] }}　{{ @Session::get('dataInputs')['u_g_name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">氏名カナ</td>
                        <td colspan="7">
                            {{ @Session::get('dataInputs')['u_f_name_kana'] }}　{{ @Session::get('dataInputs')['u_g_name_kana'] }}
                        </td>
                    </tr>
                    <tr>
                        <td width="17%" class="col-title">表示用氏名</td>
                        <td colspan="7">
                            {{ @Session::get('dataInputs')['u_name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">ユーザーID</td>
                        <td colspan="7">{{ @Session::get('dataInputs')['u_login'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">パスワード</td>
                        <td colspan="7">*******</td>
                    </tr>
                    <tr>
                        <td class="col-title">装置</td>
                        <td colspan="7">&nbsp;</td>
                    </tr>

                    <tr>
                        <td class="col-title">権限</td>
                        <td width="83%">
                            <?php
                            switch ( Session::get('dataInputs')['u_power'] ) {
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
                    </tr><tr>
                        <td class="col-title">シフト利用</td>
                        <td>
                            @if ( @Session::get('dataInputs')['u_shift'] == 1 )
                                する [{{ @Session::get('dataInputs')['u_acronym'] }}]
                            @else
                                しない
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">シフトでのアイコンの色</td>
                        <td style="color:{{ @Session::get('dataInputs')['u_color'] }};">■</td>
                    </tr>

                    <tr>
                        <td class="col-title">退職日</td>
                        <td colspan="7">{{ empty(@Session::get('dataInputs')['u_quit_day']) ? '' : date('Y/m/d', strtotime(@Session::get('dataInputs')['u_quit_day'])) }}
                        </td>
                        <td colspan="7">

                        </td>
                    </tr>

                    <tr>
                        <td class="col-title">備考</td>
                        <td colspan="7">{{ @Session::get('dataInputs')['u_memo'] }}</td>
                    </tr>

                    </tbody></table>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <br>
                    <input value="一覧へ戻る" onclick="location.href='{{ route('backend.users.index', Session::get('whereParams')) }}'" type="button" class="btn btn-sm btn-page">
                </div>
            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  