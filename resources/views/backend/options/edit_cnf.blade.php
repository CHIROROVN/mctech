@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>オプション　＞　変更確認</h3>
                こちらの内容に変更しますか？
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">オプション名</td>
                        <td>{{ @Session::get('dataInputs')['option_name'] }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">価格</td>
                        <td>￥<span class="money">{{ number_format(@Session::get('dataInputs')['option_price']) }}</span></td>
                    </tr>
                    <tr>
                        <td class="col-title">装置</td>
                        <td>
                            @if ( !empty(Session::get('dataInputs')['materialName']) && count(Session::get('dataInputs')['materialName']) > 0 )
                                @foreach( Session::get('dataInputs')['materialName'] as $item )
                                    {{ $item['material_name'] }}<br>
                                @endforeach
                            @endif
                        </td>
                    </tr>
                    </tbody></table>
            </div>
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <input value="戻る" onclick="location.href='{{ route('backend.options.edit', ['id' => $id, 'back' => 'back']) }}'" type="button" class="btn btn-sm btn-page">
                    <input value="変更する" onclick="location.href='{{ route('backend.options.edit.end', $id) }}'" type="button" class="btn btn-sm btn-page mar-left5">
                </div>
            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  