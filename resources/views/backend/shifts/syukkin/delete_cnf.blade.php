@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>シフト　＞　全体の出勤パターン管理</h3>
          こちらの種別を削除しますか？
          <table class="table table-bordered treatment2-list" style="width:30%;margin:0 auto;float:none;margin-bottom:20px;">
            <tr>
              <td class="col-title" align="center">現在登録中の種別</td>
            </tr>
            <tr>
              <td width="50%" align="center"><font color="{{$working->working_color}}">{{$working->working_name}}</font></td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='{{route('backend.shifts.syukkin.index')}}'" type="button" class="btn btn-sm btn-page">　　　<input value="削除" onclick="location.href='{{route('backend.shifts.syukkin.delete_save', $working->working_id)}}'" type="button" class="btn btn-sm btn-page">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection