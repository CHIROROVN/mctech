@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>ユーザー管理　＞　削除完了</h3>
                <p>下記の内容を削除しました。</p>
                <table width="80%" class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td width="17%" class="col-title">氏名</td>
                        <td colspan="7">
                            {{ $user->u_f_name }} {{ $user->u_g_name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">氏名カナ</td>
                        <td colspan="7">
                            {{ $user->u_f_name_kana }} {{ $user->u_g_name_kana }}
                        </td>
                    </tr>
                    <tr>
                        <td width="17%" class="col-title">表示用氏名</td>
                        <td colspan="7">
                            {{ $user->u_name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">ユーザーID</td>
                        <td colspan="7">{{ $user->u_login }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">パスワード</td>
                        <td colspan="7">*******</td>
                    </tr>
                    <tr>
                        <td class="col-title">権限</td>
                        <td width="83%">
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
                    </tr>
                    <tr>
                        <td class="col-title">シフト利用</td>
                        <td>
                            @if ( $user->u_shift == 1 )
                                する
                            @else
                                しない
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">シフトでのアイコンの色</td>
                        <td style="color:{{ $user->u_color }};">■</td>
                    </tr>

                    <tr>
                        <td class="col-title">退職日</td>
                        <td colspan="7">{{ empty($user->u_quit_day) ? '' : date('Y/m/d', strtotime($user->u_quit_day)) }}
                        </td>
                        <td colspan="7">

                        </td>
                    </tr>

                    <tr>
                        <td class="col-title">備考</td>
                        <td colspan="7">{{ $user->u_memo }}</td>
                    </tr>

                    </tbody></table>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <input value="一覧へ戻る" onclick="location.href='{{ route('backend.users.index', Session::get('whereParams')) }}'" type="button" class="btn btn-sm btn-page">
                </div>
            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  