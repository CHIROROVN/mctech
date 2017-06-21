@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>装置管理　　＞　変更完了</h3>
                <p>以下の内容で変更完了しました。</p>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">装置</td>
                        <td>{{ Session::get('dataInputs')['material_name'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">価格</td>
                        <td>￥{{ number_format(Session::get('dataInputs')['material_price']) }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">区分</td>
                        <td colspan="2">
                            @if ( Session::get('dataInputs')['material_class1'] == 1 && Session::get('dataInputs')['material_class2'] == 1 )
                                オーソネットワーク, 外注
                            @else
                                @if ( Session::get('dataInputs')['material_class1'] == 1 )
                                    オーソネットワーク
                                @elseif ( Session::get('dataInputs')['material_class2'] == 1 )
                                    外注
                                @endif
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">処分予定日</td>
                        <td colspan="2">
                            @if ( Session::get('dataInputs')['material_disposal'] == 4 )
                                4ヶ月後
                            @endif
                            @if ( Session::get('dataInputs')['material_disposal'] == 6 )
                                6ヶ月後
                            @endif
                        </td>
                    </tr>
                    </tbody></table>
            </div>

        </div>
        <div class="col-md-12 text-center">
            <br>
            <input value="一覧へ戻る" onclick="location.href='{{ route('backend.materials.index', Session::get('whereParams')) }}'" type="button" class="btn btn-sm btn-page">
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  