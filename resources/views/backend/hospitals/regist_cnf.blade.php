@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>外注医院管理　＞　確認</h3>
                <p>こちらの内容で登録しますか？ </p>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">表示名</td>
                        <td>{{ @Session::get('dataInputs')['hospital_display'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">正式名称</td>
                        <td>{{ @Session::get('dataInputs')['hospital_name'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">院長名</td>
                        <td>{{ @Session::get('dataInputs')['hospital_doctor'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">郵便番号</td>
                        <td>{{ @Session::get('dataInputs')['hospital_zip'] }}</td>
                    </tr>
                    <tr><td class="col-title">都道府県名</td>
                        <td>{{ @Session::get('dataInputs')['pref_name'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">住所</td>
                        <td>{{ @Session::get('dataInputs')['hospital_address'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">電話番号</td>
                        <td>{{ @Session::get('dataInputs')['hospital_tel'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">FAX番号</td>
                        <td>{{ @Session::get('dataInputs')['hospital_fax'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">メールアドレス</td>
                        <td>{{ @Session::get('dataInputs')['hospital_email'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">休診日</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_holiday_1']) && Session::get('dataInputs')['hospital_holiday_1'] == 1 )
                                日　
                            @endif
                            @if ( isset(Session::get('dataInputs')['hospital_holiday_2']) && Session::get('dataInputs')['hospital_holiday_2'] == 1 )
                                月　
                            @endif
                            @if ( isset(Session::get('dataInputs')['hospital_holiday_3']) && Session::get('dataInputs')['hospital_holiday_3'] == 1 )
                                火　
                            @endif
                            @if ( isset(Session::get('dataInputs')['hospital_holiday_4']) && Session::get('dataInputs')['hospital_holiday_4'] == 1 )
                                水　
                            @endif
                            @if ( isset(Session::get('dataInputs')['hospital_holiday_5']) && Session::get('dataInputs')['hospital_holiday_5'] == 1 )
                                木　
                            @endif
                            @if ( isset(Session::get('dataInputs')['hospital_holiday_6']) && Session::get('dataInputs')['hospital_holiday_6'] == 1 )
                                金　
                            @endif
                            @if ( isset(Session::get('dataInputs')['hospital_holiday_7']) && Session::get('dataInputs')['hospital_holiday_7'] == 1 )
                                土　
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">割引率</td>
                        <td>{{ @Session::get('dataInputs')['hospital_discount'] }}％</td>
                    </tr>
                    <tr>
                        <td class="col-title">箱の返却</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_return']) && Session::get('dataInputs')['hospital_return'] == 1 )
                                要
                            @else
                                不要
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">表示</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_dspl_flag']) && Session::get('dataInputs')['hospital_dspl_flag'] == 1 )
                                する
                            @else
                                しない
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">備考</td>
                        <td>
                            @if ( isset(Session::get('dataInputs')['hospital_memo']) )
                                {!! @Session::get('dataInputs')['hospital_memo'] !!}
                            @endif
                        </td>
                    </tr>
                    </tbody></table>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <input value="戻る" onclick="location.href='{{ route('backend.hospitals.regist', ['back' => 'back']) }}'" type="button" class="btn btn-sm btn-page">
                    <input value="登録" onclick="location.href='{{ route('backend.hospitals.regist.end') }}'" type="button" class="btn btn-sm btn-page mar-left5">
                </div>
            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  