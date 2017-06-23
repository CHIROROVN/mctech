@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>管理　＞　オプション　＞　検索・一覧</h3>
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">検索</td>
                        <td>
                            {!! Form::open( ['method' => 'get', 'route' => 'backend.options.index', 'enctype'=>'multipart/form-data']) !!}
                            <input name="keyword" type="text" id="keyword_id" class="form-control form-control--small" value="{{ $keyword }}">
                            <input type="hidden" name="keyword_id" id="keyword_id-id" value="{{ $keyword_id }}">

                            オーソネットワーク<select name="s_material_class1" class="form-control form-control--auto mar-left10">
                                <option value="">全て</option>
                                @foreach( $materialClass1 as $item )
                                    <option value="{{ $item->material_id }}" @if($s_material_class1 == $item->material_id) selected @endif>{{ $item->material_name }}</option>
                                @endforeach
                            </select>　　
                            外注<select name="s_material_class2" class="form-control form-control--small mar-left10">
                                <option value="">全て</option>
                                @foreach( $materialClass2 as $item )
                                    <option value="{{ $item->material_id }}" @if($s_material_class2 == $item->material_id) selected @endif>{{ $item->material_name }}</option>
                                @endforeach
                            </select>
                            <input value="検索" type="submit" class="btn btn-sm btn-page  mar-left10">
                            </form>
                        </td>
                    </tr>
                    </tbody></table>
                <input value="新規登録" onclick="location.href='{{ route('backend.options.regist') }}'" type="button" class="btn btn-sm btn-page">

                <table class="table table-bordered table-striped treatment2-list">
                    <tbody><tr>
                        <td align="center" class="col-title" style="width:10%">オプション</td>
                        <td align="center" class="col-title" style="width:10%">価格</td>
                        <td align="center" class="col-title" style="width:80%">選択装置</td>
                        <td align="center" class="col-title col-action">詳細</td>
                    </tr>

                    @if ( !empty($options) && count($options) > 0 )
                        @foreach ( $options as $option )
                            @if ( (empty($s_material_class1) && empty($s_material_class2)) || in_array($s_material_class1, $option->materialIdClass1) || in_array($s_material_class2, $option->materialIdClass2) )
                            <tr>
                                <td>{{ $option->option_name }}</td>
                                <td align="right">￥<span class="money">{!! number_format($option->option_price) !!}</span></td>
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
                                <td align="center"><input value="詳細" type="button" onclick="location.href='{{ route('backend.options.detail', $option->option_id) }}'" class="btn btn-sm btn-page"></td>
                            </tr>
                            @endif
                        @endforeach
                    @endif

                    </tbody></table>

                @if ( count($options) > 0 && !empty($options) )
                    <div class="col-md-12 text-center pagination">
                        @if ( $page > 1 )
                            <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='{{ route('backend.options.index', ['page' => $page - 1, 'keyword' => $keyword, 'keyword_id' => $keyword_id, 's_material_class1' => $s_material_class1, 's_material_class2' => $s_material_class2]) }}'">&lt; 前の30件</button>&ensp;&ensp;&ensp;
                        @endif
                        @if ( $page < $totalPage )
                            <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='{{ route('backend.options.index', ['page' => $page + 1, 'keyword' => $keyword, 'keyword_id' => $keyword_id, 's_material_class1' => $s_material_class1, 's_material_class2' => $s_material_class2]) }}'">次の30件 &gt;</button>
                        @endif
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!--END PAGE CONTENT -->

    <script>
        $(document).ready(function() {
            $("#keyword_id").autocomplete({
                minLength: 0,
                // source: pamphlets,
                source: function (request, response) {
                    var key = $('#keyword_id').val();
                    $.ajax({
                        url: "{{ route('backend.options.autocomplete.options.name') }}",
                        beforeSend: function () {
                            // console.log(response);
                        },
                        async: true,
                        data: {key: key},
                        dataType: "json",
                        method: "get",
                        // success: response
                        success: function (data) {
                            // console.log(data);
                            response(data);
                        },
                    });
                },
                focus: function (event, ui) {
                    $("#keyword_id").val(ui.item.label);
                    return false;
                },
                select: function (event, ui) {
                    $("#keyword_id").val(ui.item.label);
                    $("#keyword_id-id").val(ui.item.value);
                    // $( "#keyword_id-description" ).html( ui.item.desc );
                    return false;
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>")
                //.append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
                    .append("<a>" + item.desc + "</a>")
                    .appendTo(ul);
            };
        });
    </script>

@endsection  