@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>オプション　＞　登録完了</h3>
                <p>以上の内容で登録完了しました。</p>
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

        </div>
        <div class="col-md-12 text-center">
            <br>
            <input value="一覧へ戻る" onclick="location.href='{{ route('backend.options.index', Session::get('whereParams')) }}'" type="button" class="btn btn-sm btn-page">
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  