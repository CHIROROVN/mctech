@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>装置管理　＞　変更確認</h3>
                <p>こちらの内容で変更しますか？ </p>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">装置</td>
                        <td>{{ Session::get('dataInputs')['material_name'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">価格</td>
                        <td>{{ Session::get('dataInputs')['material_price'] }}</td>
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

            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <input value="戻る" onclick="location.href='{{ route('backend.materials.edit', ['id' => $id, 'back' => 'back']) }}'" type="button" class="btn btn-sm btn-page">
                    <input value="変更する" onclick="location.href='{{ route('backend.materials.edit.end', $id) }}'" type="button" class="btn btn-sm btn-page mar-left5">
                </div>
            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  