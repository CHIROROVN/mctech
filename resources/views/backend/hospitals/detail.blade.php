@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>外注医院管理　＞　詳細　</h3>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">表示医院名</td>
                        <td>{{ $hospital->hospital_display }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">正式名称</td>
                        <td>{{ $hospital->hospital_name }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">院長名</td>
                        <td>{{ $hospital->hospital_doctor }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">都道府県</td>
                        <td>{{ $hospital->hospital_zip }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">郵便番号</td>
                        <td>{{ $hospital->pref_name }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">住所</td>
                        <td>{{ $hospital->hospital_address }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">電話番号</td>
                        <td>{{ $hospital->hospital_tel }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">FAX番号</td>
                        <td>{{ $hospital->hospital_fax }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">メールアドレス</td>
                        <td>{{ $hospital->hospital_email }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">休診日</td>
                        <td>
                            @if ( isset($hospital->hospital_holiday_1) && $hospital->hospital_holiday_1 == 1 )
                                日　
                            @endif
                            @if ( isset($hospital->hospital_holiday_2) && $hospital->hospital_holiday_2 == 1 )
                                月　
                            @endif
                            @if ( isset($hospital->hospital_holiday_3) && $hospital->hospital_holiday_3 == 1 )
                                火　
                            @endif
                            @if ( isset($hospital->hospital_holiday_4) && $hospital->hospital_holiday_4 == 1 )
                                水　
                            @endif
                            @if ( isset($hospital->hospital_holiday_5) && $hospital->hospital_holiday_5 == 1 )
                                木　
                            @endif
                            @if ( isset($hospital->hospital_holiday_6) && $hospital->hospital_holiday_6 == 1 )
                                金　
                            @endif
                            @if ( isset($hospital->hospital_holiday_7) && $hospital->hospital_holiday_7 == 1 )
                                土　
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">割引率</td>
                        <td>{{ $hospital->hospital_discount }}％</td>
                    </tr>
                    <tr>
                        <td class="col-title">箱の返却</td>
                        <td>
                            @if ( isset($hospital->hospital_return) && $hospital->hospital_return == 1 )
                                要
                            @else
                                不要
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">表示</td>
                        <td>
                            @if ( isset($hospital->hospital_dspl_flag) && $hospital->hospital_dspl_flag == 1 )
                                する
                            @else
                                しない
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">備考</td>
                        <td>
                            @if ( isset($hospital->hospital_memo) )
                                {!! @$hospital->hospital_memo !!}
                            @endif
                        </td>
                    </tr>
                    </tbody></table>
            </div>

        </div>
        <div class="col-md-12 text-center">
            <br>
            <input value="一覧へ戻る" onclick="location.href='{{ route('backend.hospitals.index') }}'" type="button" class="btn btn-sm btn-page">　
            <input value="変更する" onclick="location.href='{{ route('backend.hospitals.edit', $hospital->hospital_id) }}'" type="button" class="btn btn-sm btn-page">
            　<input value="削除する" onclick="location.href='{{ route('backend.hospitals.delete.cnf', $hospital->hospital_id) }}'" type="button" class="btn btn-sm btn-page">
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  