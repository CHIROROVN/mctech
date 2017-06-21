@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>オプション　＞　詳細</h3>
                <p>&nbsp;</p>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">オプション名</td>
                        <td>{{ $option->option_name }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">価格</td>
                        <td>￥<span class="money">{{ number_format($option->option_price) }}</span></td>
                    </tr>
                    <tr>
                        <td class="col-title">装置</td>
                        <td>
                            @if ( !empty($option->materials) && count($option->materials) > 0 )
                                @foreach ( $option->materials as $key => $material )
                                    @if ( $key == 0 )
                                        {{ $material->material_name }}
                                    @else
                                        , {{ $material->material_name }}
                                    @endif
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    </tbody></table>
            </div>

        </div>
        <div class="col-md-12 text-center">
            <br>
            <input value="一覧へ戻る" onclick="location.href='{{ route('backend.options.index') }}'" type="button" class="btn btn-sm btn-page">　
            <input value="変更する" onclick="location.href='{{ route('backend.options.edit', $option->option_id) }}'" type="button" class="btn btn-sm btn-page">　
            <input value="削除する" onclick="location.href='{{ route('backend.options.delete.cnf', $option->option_id) }}'" type="button" class="btn btn-sm btn-page">
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  