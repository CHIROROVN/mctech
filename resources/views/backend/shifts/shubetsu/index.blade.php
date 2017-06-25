@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>シフト　＞　シフト種別管理</h3>
          <table class="table table-bordered treatment2-list" style="width:30%;margin:0 auto;float:none;margin-bottom:20px;">
            <div style="margin:0 auto; width:30%;margin-bottom:4px;" align="right">
            <input value="新規登録" onclick="location.href='{{route('backend.shifts.shubetsu.regist')}}'" type="button" class="btn btn-sm btn-page">
            </div>
            <tr>
              <td style="width: 100px;" class="col-title" align="center">現在登録中の種別</td>
              <td style="width: 20px;" class="col-title" align="center">変更</td>
              <td style="width: 20px;" class="col-title" align="center">削除</td>
            </tr>
            @if(count($kshifts)>0)
            @foreach($kshifts as $kshift)
            <tr>
              <td align="center" style="color: {{$kshift->kshift_color}};">{{$kshift->kshift_name}}</td>
              <td align="center">
                <input value="変更" onclick="location.href='{{route('backend.shifts.shubetsu.change')}}'" type="button" class="btn btn-sm btn-page">
              </td>
              <td align="center">
                <input value="削除" onclick="location.href='{{route('backend.shifts.shubetsu.delete_cnf')}}'" type="button" class="btn btn-sm btn-page">
              </td>
            </tr>
            @endforeach
            @else
            <tr><td colspan="3" style="text-align: center;">該当するデータがありません。</td></tr>
            @endif

          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='manage.html'" type="button" class="btn btn-sm btn-page">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  