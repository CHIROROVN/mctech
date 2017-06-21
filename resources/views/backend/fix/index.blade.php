@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>備品管理　＞　検索・一覧</h3>
          {!! Form::open( ['id' => 'frmSearch', 'method' => 'get', 'class'=>'form-inline', 'route' => 'backend.fix.index']) !!}
            <select name="equipment_cat" class="form-control form-control--small mar-left10" style="text-align: center;">
                <option value="all" @if(old('equipment_cat') == 'all' || old('equipment_cat') == '') selected @elseif($equipment_cat == 'all' || $equipment_cat=='') selected  @endif>すべて</option>
                <option value="1" @if(old('equipment_cat') == '1') selected @elseif($equipment_cat == '1') selected @endif>技工</option>
                <option value="2" @if(old('equipment_cat') == '2') selected @elseif($equipment_cat == '2') selected @endif>写真</option>
                <option value="3" @if(old('equipment_cat') == '3') selected @elseif($equipment_cat == '3') selected @endif>その他</option>
            </select>
            <!-- <input value="検索" type="button" class="btn btn-sm btn-page  mar-left10"><br><br> -->
            <button type="submit" class="btn btn-sm btn-page  mar-left10">検索</button>
            {!! Form::close() !!}
            <br>
            <input value="新規登録"onClick="location.href='{{route('backend.fix.regist')}}'" type="button" class="btn btn-sm btn-page">

          <table width="91%" class="table table-bordered treatment2-list">
            <tr>
              <td align="center" class="col-title">名目</td>
              <td align="center" class="col-title">備品名</td>
              <td align="center" class="col-title">価格</td>
              <td align="center" class="col-title">詳細</td>
              
            </tr>
            @if(count($equiptments)>0)
            @foreach( $equiptments as $equip)
            <tr>
              <td>{{@$categories[$equip->equipment_category]}}</td>
              <td>{{$equip->equipment_name}}</td>
              <td>{{number_format($equip->equipment_price)}}</td>
              <td style="text-align: center;"><input value="詳細" onClick="location.href='{{route('backend.fix.detail', [$equip->equipment_id,'equipment_cat'=>$equipment_cat])}}'" type="button" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
            @endforeach
            @else
              <tr><td colspan="4" style="text-align: center;">該当するデータがありません。</td></tr>
            @endif
          </table>
          <div class="col-md-12 text-center pagination">
          {{ $equiptments->appends(['equipment_cat' => $equipment_cat])->links(), ['PAGINATION'=>PAGINATION] }}
              <!-- <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href=''">&lt; 前の30件</button>&ensp;&ensp;&ensp;
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href=''">次の30件 &gt;</button> -->
            </div>
          <p>&nbsp;</p>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  