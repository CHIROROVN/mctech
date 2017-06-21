@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>備品管理　＞　削除完了</h3>
                <p>こちらの内容を削除しました。</p>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">備品名</td>
                        <td>{{ $option->option_name }}</td>
                    </tr>
                    <tr>
                        <td class="col-title">価格</td>
                        <td>￥<span class="money">{{ number_format($option->option_price) }}</span></td>
                    </tr>
                    <tr>
                        <td class="col-title">名目</td>
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
            <div class="row margin-bottom">
                <div class="col-md-12 text-center">
                    <input value="一覧へ戻る" onclick="location.href='{{ route('backend.options.index', Session::get('whereParams')) }}'" type="button" class="btn btn-sm btn-page mar-left5">
                </div>
            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  