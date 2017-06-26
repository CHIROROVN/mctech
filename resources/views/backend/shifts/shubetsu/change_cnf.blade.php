@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
<section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>シフト　＞　シフト種別管理</h3>
          <table class="table table-bordered treatment2-list" style="width:30%;margin:0 auto;float:none;margin-bottom:20px;">
            <tr>
              <td class="col-title" align="center">現在登録中の種別</td>
              <td class="col-title" align="center">現在登録中の色</td>
              <td class="col-title" align="center">変更後の種別</td>
              <td class="col-title" align="center">変更後の色</td>
            </tr>
            <tr>
              <td width="25%" align="center"><font color="{{$kshift->kshift_color}}">{{$kshift->kshift_name}}</font></td>
              <td width="25%" align="center"><font color="{{$kshift->kshift_color}}">■</font></td>
              <td width="25%" align="center"><font color="{{$shubetsu->kshift_color}}">{{$shubetsu->kshift_name}}</font></td>
              <td width="25%" align="center"><font color="{{$shubetsu->kshift_color}}">■</font></td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='{{route('backend.shifts.shubetsu.change', $kshift_id)}}'" type="button" class="btn btn-sm btn-page">　　　<input value="登録" onclick="location.href='{{route('backend.shifts.shubetsu.change_save', $kshift_id)}}'" type="button" class="btn btn-sm btn-page">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  