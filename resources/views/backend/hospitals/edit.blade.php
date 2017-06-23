@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    {!! Form::open( ['method' => 'post', 'route' => ['backend.hospitals.edit', $hospital->hospital_id], 'enctype'=>'multipart/form-data']) !!}
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>医院管理　＞　変更</h3>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td width="17%" class="col-title">表示名</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_display']) )
                                <input type="input" name="hospital_display" value="{{ @Session::get('dataInputs')['hospital_display'] }}" class="form-control form-control--sm">
                            @elseif ( old('hospital_display') )
                                <input type="input" name="hospital_display" value="{{ old('hospital_display') }}" class="form-control form-control--sm">
                            @else
                                <input type="input" name="hospital_display" value="{{ $hospital->hospital_display }}" class="form-control form-control--sm">
                            @endif

                            @if ($errors->first('hospital_display'))
                                <span class="error-input">※ {!! $errors->first('hospital_display') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">正式名称</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_name']) )
                                <input type="input" name="hospital_name" value="{{ @Session::get('dataInputs')['hospital_name'] }}" class="form-control form-control--sm">
                            @elseif ( old('hospital_name') )
                                <input type="input" name="hospital_name" value="{{ old('hospital_name') }}" class="form-control form-control--sm">
                            @else
                                <input type="input" name="hospital_name" value="{{ $hospital->hospital_name }}" class="form-control form-control--sm">
                            @endif

                            @if ($errors->first('hospital_name'))
                                <span class="error-input">※ {!! $errors->first('hospital_name') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">院長名</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_doctor']) )
                                <input type="input" name="hospital_doctor" value="{{ @Session::get('dataInputs')['hospital_doctor'] }}" class="form-control form-control--sm">
                            @elseif ( old('hospital_doctor') )
                                <input type="input" name="hospital_doctor" value="{{ old('hospital_doctor') }}" class="form-control form-control--sm">
                            @else
                                <input type="input" name="hospital_doctor" value="{{ $hospital->hospital_doctor }}" class="form-control form-control--sm">
                            @endif

                            @if ($errors->first('hospital_doctor'))
                                <span class="error-input">※ {!! $errors->first('hospital_doctor') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">郵便番号</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_zip']) )
                                <input type="input" name="hospital_zip" value="{{ @Session::get('dataInputs')['hospital_zip'] }}" class="form-control form-control--sm">
                            @elseif ( old('hospital_zip') )
                                <input type="input" name="hospital_zip" value="{{ old('hospital_zip') }}" class="form-control form-control--sm">
                            @else
                                <input type="input" name="hospital_zip" value="{{ $hospital->hospital_zip }}" class="form-control form-control--sm">
                            @endif

                            @if ($errors->first('hospital_zip'))
                                <span class="error-input">※ {!! $errors->first('hospital_zip') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title"><font color="red">※</font>都道府県</td>
                        <td>
                            <select name="pref_code" class="form-control form-control--small_u" style="width:330px;">
                                <option value="">都道府県</option>

                                @foreach ( $prefs as $pref )
                                    @if ( isset(Session::get('dataInputs')['pref_code']) && Session::get('dataInputs')['pref_code'] == $pref->pref_id )
                                        <option value="{{ $pref->pref_id }}" selected>{{ $pref->pref_name }}</option>
                                    @elseif ( old('pref_code') )
                                        <option value="{{ $pref->pref_id }}" @if(old('pref_code') == $pref->pref_id) selected @endif>{{ $pref->pref_name }}</option>
                                    @else
                                        <option value="{{ $pref->pref_id }}" @if($hospital->pref_code == $pref->pref_id) selected @endif>{{ $pref->pref_name }}</option>
                                    @endif
                                @endforeach

                            </select>

                            @if ($errors->first('pref_code'))
                                <span class="error-input">※ {!! $errors->first('pref_code') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">住所</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_address']) )
                                <input type="input" name="hospital_address" value="{{ @Session::get('dataInputs')['hospital_address'] }}" class="form-control form-control--sm">
                            @elseif ( old('hospital_address') )
                                <input type="input" name="hospital_address" value="{{ old('hospital_address') }}" class="form-control form-control--sm">
                            @else
                                <input type="input" name="hospital_address" value="{{ $hospital->hospital_address }}" class="form-control form-control--sm">
                            @endif

                            @if ($errors->first('hospital_address'))
                                <span class="error-input">※ {!! $errors->first('hospital_address') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">電話番号</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_tel']) )
                                <input type="input" name="hospital_tel" value="{{ @Session::get('dataInputs')['hospital_tel'] }}" class="form-control form-control--sm">
                            @elseif ( old('hospital_tel') )
                                <input type="input" name="hospital_tel" value="{{ old('hospital_tel') }}" class="form-control form-control--sm">
                            @else
                                <input type="input" name="hospital_tel" value="{{ $hospital->hospital_tel }}" class="form-control form-control--sm">
                            @endif

                            @if ($errors->first('hospital_tel'))
                                <span class="error-input">※ {!! $errors->first('hospital_tel') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">FAX番号</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_fax']) )
                                <input type="input" name="hospital_fax" value="{{ @Session::get('dataInputs')['hospital_fax'] }}" class="form-control form-control--sm">
                            @elseif ( old('hospital_fax') )
                                <input type="input" name="hospital_fax" value="{{ old('hospital_fax') }}" class="form-control form-control--sm">
                            @else
                                <input type="input" name="hospital_fax" value="{{ $hospital->hospital_fax }}" class="form-control form-control--sm">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">メールアドレス</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_email']) )
                                <input type="input" name="hospital_email" value="{{ @Session::get('dataInputs')['hospital_email'] }}" class="form-control form-control--sm">
                            @elseif ( old('hospital_email') )
                                <input type="input" name="hospital_email" value="{{ old('hospital_email') }}" class="form-control form-control--sm">
                            @else
                                <input type="input" name="hospital_email" value="{{ $hospital->hospital_email }}" class="form-control form-control--sm">
                            @endif

                            @if ($errors->first('hospital_email'))
                                <span class="error-input">※ {!! $errors->first('hospital_email') !!}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">休診日</td>
                        <td>
                            <p>
                                @if ( isset(Session::get('dataInputs')['hospital_holiday_1']) && Session::get('dataInputs')['hospital_holiday_1'] == 1 )
                                    <input name="hospital_holiday_1" value="1" type="checkbox" checked> 日　
                                @elseif ( old('hospital_holiday_1') )
                                    <input name="hospital_holiday_1" value="1" type="checkbox" @if(old('hospital_holiday_1') == 1) checked @endif> 日　
                                @else
                                    <input name="hospital_holiday_1" value="1" type="checkbox" @if($hospital->hospital_holiday_1 == 1) checked @endif> 日　
                                @endif
                                @if ( isset(Session::get('dataInputs')['hospital_holiday_2']) && Session::get('dataInputs')['hospital_holiday_2'] == 1 )
                                    <input name="hospital_holiday_2" value="1" type="checkbox" checked> 月　
                                @elseif ( old('hospital_holiday_2') )
                                    <input name="hospital_holiday_2" value="1" type="checkbox" @if(old('hospital_holiday_2') == 1) checked @endif> 月　
                                @else
                                    <input name="hospital_holiday_2" value="1" type="checkbox" @if($hospital->hospital_holiday_2 == 1) checked @endif> 月　
                                @endif
                                @if ( isset(Session::get('dataInputs')['hospital_holiday_3']) && Session::get('dataInputs')['hospital_holiday_3'] == 1 )
                                    <input name="hospital_holiday_3" value="1" type="checkbox" checked> 火　
                                @elseif ( old('hospital_holiday_3') )
                                    <input name="hospital_holiday_3" value="1" type="checkbox" @if(old('hospital_holiday_3') == 1) checked @endif> 火　
                                @else
                                    <input name="hospital_holiday_3" value="1" type="checkbox" @if($hospital->hospital_holiday_3 == 1) checked @endif> 火　
                                @endif
                                @if ( isset(Session::get('dataInputs')['hospital_holiday_4']) && Session::get('dataInputs')['hospital_holiday_4'] == 1 )
                                    <input name="hospital_holiday_4" value="1" type="checkbox" checked> 水　
                                @elseif ( old('hospital_holiday_4') )
                                    <input name="hospital_holiday_4" value="1" type="checkbox" @if(old('hospital_holiday_4') == 1) checked @endif> 水　
                                @else
                                    <input name="hospital_holiday_4" value="1" type="checkbox" @if($hospital->hospital_holiday_4 == 1) checked @endif> 水　
                                @endif
                                @if ( isset(Session::get('dataInputs')['hospital_holiday_5']) && Session::get('dataInputs')['hospital_holiday_5'] == 1 )
                                    <input name="hospital_holiday_5" value="1" type="checkbox" checked> 木　
                                @elseif ( old('hospital_holiday_5') )
                                    <input name="hospital_holiday_5" value="1" type="checkbox" @if(old('hospital_holiday_5') == 1) checked @endif> 木　
                                @else
                                    <input name="hospital_holiday_5" value="1" type="checkbox" @if($hospital->hospital_holiday_5 == 1) checked @endif> 木　
                                @endif
                                @if ( isset(Session::get('dataInputs')['hospital_holiday_6']) && Session::get('dataInputs')['hospital_holiday_6'] == 1 )
                                    <input name="hospital_holiday_6" value="1" type="checkbox" checked> 金　
                                @elseif ( old('hospital_holiday_6') )
                                    <input name="hospital_holiday_6" value="1" type="checkbox" @if(old('hospital_holiday_6') == 1) checked @endif> 金　
                                @else
                                    <input name="hospital_holiday_6" value="1" type="checkbox" @if($hospital->hospital_holiday_6 == 1) checked @endif> 金　
                                @endif
                                @if ( isset(Session::get('dataInputs')['hospital_holiday_7']) && Session::get('dataInputs')['hospital_holiday_7'] == 1 )
                                    <input name="hospital_holiday_7" value="1" type="checkbox" checked> 土　
                                @elseif ( old('hospital_holiday_7') )
                                    <input name="hospital_holiday_7" value="1" type="checkbox" @if(old('hospital_holiday_7') == 1) checked @endif> 土　
                                @else
                                    <input name="hospital_holiday_7" value="1" type="checkbox" @if($hospital->hospital_holiday_7 == 1) checked @endif> 土　
                                @endif
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">割引率</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_discount']) )
                                <input type="input" name="hospital_discount" value="{{ @Session::get('dataInputs')['hospital_discount'] }}" class="form-control form-control--xs">
                            @elseif ( old('hospital_discount') )
                                <input type="input" name="hospital_discount" value="{{ old('hospital_discount') }}" class="form-control form-control--xs">
                            @else
                                <input type="input" name="hospital_discount" value="{{ $hospital->hospital_discount }}" class="form-control form-control--xs">
                            @endif
                            ％
                        </td>
                    </tr><tr>


                    </tr><tr></tr>
                    <tr><td class="col-title">箱の返却</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_return']) && Session::get('dataInputs')['hospital_return'] == 1 )
                                <input type="radio" name="hospital_return" value="1" checked> 要
                            @elseif ( old('hospital_return') )
                                <input type="radio" name="hospital_return" value="1" @if(old('hospital_return') == 1) checked @endif> 要
                            @elseif ( $hospital->hospital_return == 1 )
                                <input type="radio" name="hospital_return" value="1" checked> 要
                            @else
                                <input type="radio" name="hospital_return" value="1"> 要
                            @endif
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @if ( isset(Session::get('dataInputs')['hospital_return']) && Session::get('dataInputs')['hospital_return'] != 1 )
                                <input type="radio" name="hospital_return" value="0" checked> 不要
                            @elseif ( old('hospital_return') )
                                <input type="radio" name="hospital_return" value="0" @if(old('hospital_return') != 1 && old('hospital_return') == 0) checked @endif> 不要
                            @elseif ( $hospital->hospital_return != 1 && $hospital->hospital_return == 0 )
                                <input type="radio" name="hospital_return" value="0" checked> 不要
                            @else
                                <input type="radio" name="hospital_return" value="0"> 不要
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">表示</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_dspl_flag']) && Session::get('dataInputs')['hospital_dspl_flag'] == 1 )
                                <input type="radio" name="hospital_dspl_flag" value="1" checked> する
                            @elseif ( old('hospital_dspl_flag') )
                                <input type="radio" name="hospital_dspl_flag" value="1" @if(old('hospital_dspl_flag') == 1) checked @endif> する
                            @elseif ( $hospital->hospital_dspl_flag == 1 )
                                <input type="radio" name="hospital_dspl_flag" value="1" checked > する
                            @else
                                <input type="radio" name="hospital_dspl_flag" value="1"> する
                            @endif
                            &nbsp;&nbsp;&nbsp;
                            @if ( isset(Session::get('dataInputs')['hospital_dspl_flag']) && Session::get('dataInputs')['hospital_dspl_flag'] != 1 )
                                <input type="radio" name="hospital_dspl_flag" value="0" checked> しない
                            @elseif ( old('hospital_dspl_flag') )
                                <input type="radio" name="hospital_dspl_flag" value="0" @if(old('hospital_dspl_flag') != 1 && old('hospital_dspl_flag') == 0) checked @endif> しない
                            @elseif ( $hospital->hospital_dspl_flag != 1 && $hospital->hospital_dspl_flag == 0 )
                                <input type="radio" name="hospital_dspl_flag" value="0" checked> しない
                            @else
                                <input type="radio" name="hospital_dspl_flag" value="0" > しない
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">備考</td>
                        <td colspan="3">
                            @if ( isset(Session::get('dataInputs')['hospital_memo']) )
                                <textarea name="hospital_memo" cols="60" rows="5" id="textfield16" class="form-control form-control--default">{{ @Session::get('dataInputs')['hospital_memo'] }}</textarea>
                            @elseif ( old('hospital_memo') )
                                <textarea name="hospital_memo" cols="60" rows="5" id="textfield16" class="form-control form-control--default">{{ old('hospital_memo') }}</textarea>
                            @else
                                <textarea name="hospital_memo" cols="60" rows="5" id="textfield16" class="form-control form-control--default">{{ $hospital->hospital_memo }}</textarea>
                            @endif
                        </td>
                    </tr>

                    </tbody></table>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <input value="戻る" onclick="location.href='{{ route('backend.hospitals.index') }}'" type="button" class="btn btn-sm btn-page">　
                    <input value="変更する" type="submit" class="btn btn-sm btn-page">
                </div>
            </div>
        </div>
    </section>
    </form>
    <!--END PAGE CONTENT -->

    <script>
        $(document).ready(function() {

        });
    </script>
@endsection  