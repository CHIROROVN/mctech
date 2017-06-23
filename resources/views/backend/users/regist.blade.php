@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    {!! Form::open( ['method' => 'post', 'route' => 'backend.users.regist', 'enctype'=>'multipart/form-data']) !!}
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>ユーザー管理　＞　登録</h3>
                <table width="80%" class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td width="17%" class="col-title">氏名</td>
                        <td colspan="7">
                            @if ( isset(Session::get('dataInputs')['u_f_name']) )
                                <input type="input" name="u_f_name" value="{{ Session::get('dataInputs')['u_f_name'] }}" class="form-control form-control--default">
                            @else
                                <input type="input" name="u_f_name" value="{{ old('u_f_name') }}" class="form-control form-control--default">
                            @endif
                            @if ( isset(Session::get('dataInputs')['u_g_name']) )
                                <input type="input" name="u_g_name" value="{{ Session::get('dataInputs')['u_g_name'] }}" class="form-control form-control--default">
                            @else
                                <input type="input" name="u_g_name" value="{{ old('u_g_name') }}" class="form-control form-control--default">
                            @endif

                            @if ($errors->first('u_f_name'))
                                <span class="error-input">※ {!! $errors->first('u_f_name') !!}</span>
                            @endif
                            @if ($errors->first('u_g_name'))
                                <span class="error-input">※ {!! $errors->first('u_g_name') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">氏名カナ</td>
                        <td colspan="7">
                            @if ( isset(Session::get('dataInputs')['u_f_name_kana']) )
                                <input type="input" name="u_f_name_kana" value="{{ Session::get('dataInputs')['u_f_name_kana'] }}" class="form-control form-control--default">
                            @else
                                <input type="input" name="u_f_name_kana" value="{{ old('u_f_name_kana') }}" class="form-control form-control--default">
                            @endif
                            @if ( isset(Session::get('dataInputs')['u_g_name_kana']) )
                                <input type="input" name="u_g_name_kana" value="{{ Session::get('dataInputs')['u_g_name_kana'] }}" class="form-control form-control--default">
                            @else
                                <input type="input" name="u_g_name_kana" value="{{ old('u_g_name_kana') }}" class="form-control form-control--default">
                            @endif

                            @if ($errors->first('u_f_name_kana'))
                                <span class="error-input">※ {!! $errors->first('u_f_name_kana') !!}</span>
                            @endif
                            @if ($errors->first('u_g_name_kana'))
                                <span class="error-input">※ {!! $errors->first('u_g_name_kana') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">表示用氏名</td>
                        <td colspan="7">
                            @if ( isset(Session::get('dataInputs')['u_name']) )
                                <input type="input" name="u_name" value="{{ Session::get('dataInputs')['u_name'] }}" class="form-control form-control--default">
                            @else
                                <input type="input" name="u_name" value="{{ old('u_name') }}" class="form-control form-control--default">
                            @endif

                            @if ($errors->first('u_name'))
                                <span class="error-input">※ {!! $errors->first('u_name') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">ユーザーID</td>
                        <td colspan="7">
                            @if ( isset(Session::get('dataInputs')['u_login']) )
                                <input type="input" name="u_login" value="{{ Session::get('dataInputs')['u_login'] }}" class="form-control form-control--default">
                            @else
                                <input type="input" name="u_login" value="{{ old('u_login') }}" class="form-control form-control--default">
                            @endif

                            @if ($errors->first('u_login'))
                                <span class="error-input">※ {!! $errors->first('u_login') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">パスワード</td>
                        <td colspan="7">
                            @if ( isset(Session::get('dataInputs')['u_passwd']) )
                                <input type="password" name="u_passwd" value="" class="form-control form-control--default">
                            @else
                                <input type="password" name="u_passwd" value="" class="form-control form-control--default">
                            @endif

                            @if ($errors->first('u_passwd'))
                                <span class="error-input">※ {!! $errors->first('u_passwd') !!}</span>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <td class="col-title">権限</td>
                        <td width="83%">
                            <p>
                                @if ( isset(Session::get('dataInputs')['u_power']) && Session::get('dataInputs')['u_power'] == 10 )
                                    <input name="u_power" value="10" type="radio" checked>管理者&nbsp; &nbsp;&nbsp; &nbsp;
                                @else
                                    <input name="u_power" value="10" type="radio" @if(old('u_power') == 10) checked @endif>管理者&nbsp; &nbsp;&nbsp; &nbsp;
                                @endif
                                @if ( isset(Session::get('dataInputs')['u_power']) && Session::get('dataInputs')['u_power'] == 20 )
                                    <input id="u_power_20" name="u_power" value="20" type="radio" checked>技工士&nbsp; &nbsp;&nbsp; &nbsp;
                                @else
                                    <input id="u_power_20" name="u_power" value="20" type="radio" @if(old('u_power') == 20) checked @endif>技工士&nbsp; &nbsp;&nbsp; &nbsp;
                                @endif
                                @if ( isset(Session::get('dataInputs')['u_power']) && Session::get('dataInputs')['u_power'] == 30 )
                                    <input name="u_power" value="30" type="radio" checked>事務&nbsp;&nbsp;
                                @else
                                    <input name="u_power" value="30" type="radio" @if(old('u_power') == 30) checked @endif>事務&nbsp;&nbsp;
                                @endif
                            </p>
                            <p>
                                @if ( isset(Session::get('dataInputs')['u_power']) && Session::get('dataInputs')['u_power'] == 40 )
                                    <input name="u_power" value="40" type="radio" checked>経営者１&nbsp; &nbsp;
                                @else
                                    <input name="u_power" value="40" type="radio" @if(old('u_power') == 40) checked @endif>経営者１&nbsp; &nbsp;
                                @endif
                                @if ( isset(Session::get('dataInputs')['u_power']) && Session::get('dataInputs')['u_power'] == 50 )
                                    <input name="u_power" value="50" type="radio" checked>経営者２&nbsp; &nbsp;
                                @else
                                    <input name="u_power" value="50" type="radio" @if(old('u_power') == 50) checked @endif>経営者２&nbsp; &nbsp;
                                @endif
                                @if ( isset(Session::get('dataInputs')['u_power']) && Session::get('dataInputs')['u_power'] == 60 )
                                    <input name="u_power" value="60" type="radio" checked>技工事務&nbsp; &nbsp;
                                @else
                                    <input name="u_power" value="60" type="radio" @if(old('u_power') == 60) checked @endif>技工事務&nbsp; &nbsp;
                                @endif
                                @if ( isset(Session::get('dataInputs')['u_power']) && Session::get('dataInputs')['u_power'] == 70 )
                                    <input name="u_power" value="70" type="radio" checked>オーソ職員&nbsp; &nbsp;
                                @else
                                    <input name="u_power" value="70" type="radio" @if(old('u_power') == 70) checked @endif>オーソ職員&nbsp; &nbsp;
                                @endif
                            </p>

                            @if ($errors->first('u_power'))
                                <span class="error-input">※ {!! $errors->first('u_power') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">シフト利用</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['u_shift']) && Session::get('dataInputs')['u_shift'] == 1 )
                                <input id="u_shift_1" type="radio" name="u_shift" value="1" checked>する&nbsp;
                            @else
                                <input id="u_shift_1" type="radio" name="u_shift" value="1" @if(old('u_shift') == 1) checked @endif>する&nbsp;
                            @endif
                            @if ( isset(Session::get('dataInputs')['u_acronym']) )
                                <input type="input" name="u_acronym" value="{{ Session::get('dataInputs')['u_acronym'] }}" class="form-control form-control--default" style="width:50px;">&nbsp; &nbsp;
                            @else
                                <input type="input" name="u_acronym" value="{{ old('u_acronym') }}" class="form-control form-control--default" style="width:50px;">&nbsp; &nbsp;
                            @endif
                            @if ( isset(Session::get('dataInputs')['u_shift']) && Session::get('dataInputs')['u_shift'] == 0 )
                                <input type="radio" name="u_shift" value="0" checked>しない&nbsp; &nbsp;
                            @else
                                <input type="radio" name="u_shift" value="0" @if(old('u_shift') == 0) checked @endif>しない&nbsp; &nbsp;
                            @endif

                            @if ($errors->first('u_shift'))
                                <span class="error-input">※ {!! $errors->first('u_shift') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">シフトでのアイコンの色</td>
                        <td colspan="7">
                            <select style="width:50px;" name="u_color">

                                @foreach ( $colors as $color )
                                    <option style="color:{{ $color }};" value="{{ $color }}" @if(old('u_color') == $color) selected @endif>■</option>
                                @endforeach

                            </select>

                            @if ($errors->first('u_color'))
                                <span class="error-input">※ {!! $errors->first('u_color') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">退職日</td>
                        <td colspan="7">
                            <input type="input" name="u_quit_day" value="{{ old('u_quit_day') }}" class="form-control form-control--default">
                            <img src="{{ asset('') }}public/backend/common/image/dummy-calendar.png" class="icon">
                        </td>
                        <td colspan="7">

                        </td>
                    </tr>

                    <tr>
                        <td class="col-title">備考</td>
                        <td colspan="7">
                            <textarea name="u_memo" cols="60" rows="5" id="u_memo" class="form-control form-control--default">{{ old('u_memo') }}</textarea>
                        </td>
                    </tr>

                    </tbody></table>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <div class="col-md-12 text-center">
                        <input value="もどる" onclick="location.href='{{ route('backend.users.index') }}'" type="button" class="btn btn-sm btn-page">
                        <input value="確認" type="submit" class="btn btn-sm btn-page mar-left5">
                    </div>
                </div>
            </div>
        </div>
    </section>
    </form>
    <!--END PAGE CONTENT -->

    <script>
        $(document).ready(function() {
            $("#u_power_20").click(function(){
                $('#u_shift_1').prop('checked', true);
            });
        });
    </script>
@endsection  