@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>管理　＞　装置管理　＞　検索・一覧</h3>
          <table class="table table-bordered treatment2-list">
            <tbody><tr>
              <td class="col-title">検索</td>
              <td>
                {!! Form::open( ['method' => 'get', 'route' => 'backend.materials.index', 'enctype'=>'multipart/form-data']) !!}
                <input name="keyword" type="text" id="keyword_id" class="form-control form-control--small" value="{{ $keyword }}">
                <input type="hidden" name="keyword_id" id="keyword_id-id" value="{{ $keyword_id }}">
                <input value="検索" type="submit" class="btn btn-sm btn-page  mar-left10">
                </form>
              </td>
            </tr>
            </tbody></table>
          <input value="新規登録" onclick="location.href='{{ route('backend.materials.regist') }}'" type="button" class="btn btn-sm btn-page">
          <table class="table table-bordered treatment2-list">
            <tbody><tr>
              <td align="center" class="col-title">装置</td>
              <td align="center" class="col-title">区分</td>
              <td align="center" class="col-title">価格</td>
              <td align="center" class="col-title">詳細</td>
            </tr>

            @if ( count($materials) > 0 && !empty($materials) )
              @foreach ( $materials as $material )
                <tr>
                  <td>{{ $material->material_name }}</td>
                  <td>
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
                  <td align="right">￥{{ number_format($material->material_price) }}</td>
                  <td align="center"><input value="詳細" onclick="location.href='{{ route('backend.materials.detail', $material->material_id) }}'" type="button" class="btn btn-sm btn-page"></td>
                </tr>
              @endforeach
            @endif

            </tbody></table>

          @if ( count($materials) > 0 && !empty($materials) )
          <div class="col-md-12 text-center pagination">
            @if ( $page > 1 )
            <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='{{ route('backend.materials.index', ['page' => $page - 1, 'keyword' => $keyword, 'keyword_id' => $keyword_id]) }}'">&lt; 前の30件</button>&ensp;&ensp;&ensp;
            @endif
            @if ( $page < $totalPage )
            <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='{{ route('backend.materials.index', ['page' => $page + 1, 'keyword' => $keyword, 'keyword_id' => $keyword_id]) }}'">次の30件 &gt;</button>
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
                        url: "{{ route('backend.materials.autocomplete.materials.name') }}",
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