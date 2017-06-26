@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>シフト　＞　シフト種別管理</h3>
          こちらの種別を削除しますか？
          <table class="table table-bordered treatment2-list" style="width:30%;margin:0 auto;float:none;margin-bottom:20px;">
            <tr>
              <td class="col-title" align="center">現在登録中の種別</td>
            </tr>
            <tr>
            <td align="center" style="color: {{$kshift->kshift_color}};">{{$kshift->kshift_name}}</td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='{{route('backend.shifts.shubetsu.index')}}'" type="button" class="btn btn-sm btn-page">　　　<input value="削除" onclick="location.href='{{route('backend.shifts.shubetsu.delete_save',$kshift->kshift_id )}}'" type="button" class="btn btn-sm btn-page">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  