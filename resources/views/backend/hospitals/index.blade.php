@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
        <div class="container">
            <div class="row content-page">
                <h3>外注医院管理　＞　検索</h3>

                {!! Form::open( ['method' => 'get', 'route' => 'backend.hospitals.index', 'enctype'=>'multipart/form-data']) !!}
                <table class="table table-bordered treatment2-list">
                    <tbody><tr>
                        <td class="col-title">医院名</td>
                        <td>
                            <div class="col-md-12 mar-bottom">
                                <input name="keyword" type="text" id="keyword_id" class="form-control form-control--sm" value="{{ $keyword }}">
                                <input type="hidden" name="keyword_id" id="keyword_id-id" value="{{ $keyword_id }}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-title">住所</td>
                        <td>
                            <div class="col-md-12 mar-bottom">
                                <input type="input" name="s_hospital_address" value="{{ @$s_hospital_address }}" class="form-control form-control--sm">
                            </div>

                            @if ( !empty($prefInPrefs) && count($prefInPrefs) > 0 )
                                @foreach ( $areas as $area )
                                    @if ( !empty($area->prefs) && count($area->prefs) > 0 )
                                        <div class="col-md-12 mar-bottom">
                                            <input name="" value="{{ $area->area_name }}" type="button" class="btn btn-sm btn-page">&nbsp;&nbsp;&nbsp;&nbsp;
                                            @foreach ( $area->prefs as $pref )
                                                @if ( !empty($s_pref_id) && count($s_pref_id) > 0 )
                                                　  <input type="checkbox" name="s_pref_id[]" value="{{ $pref->pref_id }}" @if(in_array($pref->pref_id, $s_pref_id)) checked @endif>{{ $pref->pref_name }}
                                                @else
                                                    <input type="checkbox" name="s_pref_id[]" value="{{ $pref->pref_id }}">{{ $pref->pref_name }}
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                        </td>
                    </tr>
                    </tbody>
                </table>

                <div class="row margin-bottom">
                    <div class="col-md-12 text-center">
                        <input value="検索" type="submit" class="btn btn-sm btn-page">
                        </form>
                    </div>

                    <input value="新規登録" onclick="location.href='{{ route('backend.hospitals.regist') }}'" type="button" class="btn btn-sm btn-page">

                    <table class="table table-bordered table-striped treatment2-list">
                        <tbody><tr>
                            <td width="15%" align="center" class="col-title">医院名</td>
                            <td width="15%" align="center" class="col-title">郵便番号</td>
                            <td width="15%" align="center" class="col-title">住所</td>
                            <td width="15%" align="center" class="col-title">電話番号</td>
                            <td width="15%" align="center" class="col-title">院長名</td>
                            <td width="9%" align="center" class="col-title col-action">詳細</td>
                        </tr>

                        @if ( !empty($hospitals) && count($hospitals) > 0 )
                            @foreach ( $hospitals as $hospital )
                                <tr>
                                    <td>{{ $hospital->hospital_display }}</td>
                                    <td>{{ $hospital->hospital_zip }}</td>
                                    <td>{{ $hospital->hospital_address }}</td>
                                    <td>{{ $hospital->hospital_tel }}</td>
                                    <td>{{ $hospital->hospital_doctor }}</td>
                                    <td><input value="詳細" type="button" class="btn btn-sm btn-page" onclick="location.href='{{ route('backend.hospitals.detail', $hospital->hospital_id) }}'"></td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody></table>

                    @if ( count($hospitals) > 0 && !empty($hospitals) )
                        <div class="col-md-12 text-center pagination">
                            @if ( $page > 1 )
                                <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='{{ route('backend.hospitals.index', ['page' => $page - 1, 'keyword' => $keyword, 'keyword_id' => $keyword_id]) }}'">&lt; 前の30件</button>&ensp;&ensp;&ensp;
                            @endif
                            @if ( $page < $totalPage )
                                <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='{{ route('backend.hospitals.index', ['page' => $page + 1, 'keyword' => $keyword, 'keyword_id' => $keyword_id]) }}'">次の30件 &gt;</button>
                            @endif
                        </div>
                    @endif

                </div>
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
                        url: "{{ route('backend.hospitals.autocomplete.hospitals.name') }}",
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