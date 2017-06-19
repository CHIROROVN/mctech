@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
      <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>写真講習　＞　検索・一覧</h3>
          <table class="table table-bordered treatment2-list">
            <tr>
              <td width="8%" class="col-title">種類</td>
              <td width="70%">
              {!! Form::open( ['id' => 'frmSearch', 'method' => 'get', 'route' => 'backend.photos.index']) !!}
              <select class="form-control form-control--auto mar-left10" name="photo_id">
                <option value="all" @if($pt_selected == 'all' || $pt_selected == '') selected="" @endif>すべて</option>
                @if(count($list_photo)>0)
                  @foreach($list_photo as $k => $pt)
                  <option value="{{$k}}" @if($pt_selected == $k) selected="" @endif>{{$pt}}</option>
                  @endforeach
                @endif
              </select>
                <!-- <input value="検索" type="button" class="btn btn-sm btn-page  mar-left10"> -->
                <button type="submit" class="btn btn-sm btn-page  mar-left10">検索</button>
              {!! Form::close() !!}
              </td>
            </tr>
          </table>
          <input value="新規登録"onClick="location.href='{{route('backend.photos.regist')}}'" type="button" class="btn btn-sm btn-page">
          <table class="table table-bordered table-striped treatment2-list">
            <tr>
              <td width="28%"  class="col-title">種類</td>
              <td width="72%"  class="col-title">価格</td>
              <td width="28%"  class="col-title">詳細</td>
            </tr>
             @if(count($photos)>0)
                  @foreach($photos as $photo)
                  <tr>
                    <td>{{$photo->photo_name}}</td>
                    <td align="right">{{number_format($photo->photo_price)}}</td>
                    <td><input value="詳細" onClick="location.href='{{route('backend.photos.detail', $photo->photo_id)}}'" type="button" class="btn btn-sm btn-page  mar-left10"></td>
                </tr>
                  @endforeach
              @else
              <tr><td colspan="3" style="text-align: center;">該当するデータがありません。</td></tr>
              @endif
            
          </table>
          <div class="col-md-12 text-center pagination">
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href=''">&lt; 前の30件</button>&ensp;&ensp;&ensp;
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href=''">次の30件 &gt;</button>
            </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  