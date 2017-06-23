@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>講習　＞　検索・一覧</h3>
          {!! Form::open( ['id' => 'frmSearch', 'method' => 'get', 'class'=>'form-inline', 'route' => 'backend.lessons.index']) !!}
          <table class="table table-bordered treatment2-list">
            <tr>
              <td width="8%" class="col-title">種類</td>
              <td width="70%">
              <div class="form-group">
                  <select class="form-control form-control--auto mar-left10" name="lecture_id">
                    <option value="all" @if($ls_selected == 'all' || $ls_selected == '') selected="" @endif>すべて</option>
                  @if(count($list_lesson)>0)
                    @foreach($list_lesson as $k => $ls)
                    <option value="{{$k}}" @if($ls_selected == $k) selected="" @endif>{{$ls}}</option>
                    @endforeach
                  @endif
                  </select>
                  <button type="submit" class="btn btn-sm btn-page  mar-left10">検索</button>
                  </div>
              </td>
            </tr>
          </table>
          {!! Form::close() !!}　　
          <div class="row btn-regist" style="margin-left: 0px;">
            <input value="新規登録"onClick="location.href='{{route('backend.lessons.regist')}}'" type="button" class="btn btn-sm btn-page">
          </div>
          <table class="table table-bordered table-striped treatment2-list">
            <tr>
              <td width="28%"  class="col-title">種類</td>
              <td width="72%"  class="col-title">価格</td>
              <td width="72%"  class="col-title">詳細</td>
            </tr>
            @if(count($lessons)>0)
            @foreach( $lessons as $lesson )
            <tr>
              <td>{{$lesson->lecture_name}}</td>
              <td align="right">{{number_format($lesson->lecture_price)}}</td>
              <td><input value="詳細" type="button" onclick="location.href='{{route('backend.lessons.detail', [$lesson->lecture_id])}}'" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
            @endforeach
            @else
            <tr><td colspan="3" style="text-align: center;">該当するデータがありません。</td></tr>
            @endif
          </table>
          <div class="col-md-12 text-center pagination">
          {{ $lessons->links(), ['PAGINATION'=>PAGINATION] }}
             <!--  <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='manage_shift_in_all.html'">&lt; 前の30件</button>&ensp;&ensp;&ensp;
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='manage_shift_in_all.html'">次の30件 &gt;</button> -->


          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  