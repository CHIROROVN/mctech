@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>装置管理　＞　詳細</h3>
                <p>&nbsp;</p>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">装置</td>
                        <td>{{ $material->material_name }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">価格</td>
                        <td>￥{{ number_format($material->material_price) }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">区分</td>
                        <td colspan="2">
                            @if ( $material->material_class1 == 1 && $material->material_class2 == 1 )
                                オーソネットワーク, 外注
                            @else
                                @if ( $material->material_class1 == 1 )
                                    オーソネットワーク
                                @elseif ( $material->material_class2 == 1 )
                                    外注
                                @endif
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">処分予定日</td>
                        <td colspan="2">
                            @if ( $material->material_disposal == 4 )
                                4ヶ月後
                            @endif
                            @if ( $material->material_disposal == 6 )
                                6ヶ月後
                            @endif
                        </td>
                    </tr>
                    </tbody></table>
            </div>

            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <input value="一覧へ戻る" onclick="location.href='{{ route('backend.materials.index') }}'" type="button" class="btn btn-sm btn-page">　
                    <input value="変更する" onclick="location.href='{{ route('backend.materials.edit', $material->material_id) }}'" type="button" class="btn btn-sm btn-page">　
                    <input value="削除する" onclick="location.href='{{ route('backend.materials.delete.cnf', $material->material_id) }}'" type="button" class="btn btn-sm btn-page">
                </div>
            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  