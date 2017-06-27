@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>シフト　＞　全体の出勤パターン管理</h3>
          <table class="table table-bordered treatment2-list" style="width:30%;margin:0 auto;float:none;margin-bottom:20px;">
            <div style="margin:0 auto; width:30%;margin-bottom:4px;" align="right"><input value="新規登録" onclick="location.href='{{route('backend.shifts.syukkin.regist')}}'" type="button" class="btn btn-sm btn-page"></div>
            <tr>
              <td style="width: 200px;" class="col-title" align="center">現在登録中の種別</td>
              <td class="col-title" align="center">色</td>
              <td class="col-title" align="center">変更</td>
              <td class="col-title" align="center">削除</td>
            </tr>
            @if(count($works)>0)
            @foreach($works as $wk)
            <tr>
              <td width="50%" align="center"><font color="{{$wk->working_color}}">{{$wk->working_name}}</font></td>
              <td width="50%" align="center"><font color="{{$wk->working_color}}">■</font></td>
              <td width="10%" align="center"><input value="変更" onclick="location.href='{{route('backend.shifts.syukkin.change', $wk->working_id)}}'" type="button" class="btn btn-sm btn-page"></td>
              <td width="10%" align="center"><input value="削除" onclick="location.href='{{route('backend.shifts.syukkin.delete_cnf', $wk->working_id)}}'" type="button" class="btn btn-sm btn-page"></td>
            </tr>
            @endforeach
            @else
            <tr><td colspan="4" style="text-align: center;">該当するデータがありません。</td></tr>
            @endif

          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='{{route('backend.manage.index')}}'" type="button" class="btn btn-sm btn-page">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  