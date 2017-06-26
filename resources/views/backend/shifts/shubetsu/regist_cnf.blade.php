@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
<section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>シフト　＞　シフト種別管理</h3>
          下記の新規種別を登録しますか？
          <table class="table table-bordered treatment2-list" style="width:30%;margin:0 auto;float:none;margin-bottom:20px;">
            <tr>
              <td class="col-title" align="center">新規種別</td>
            </tr>
            <tr>
              <td width="50%" align="center">{{$shubetsu->kshift_name}}</td>
            </tr>
            <tr>
              <td width="50%" align="center"><font color="{{$shubetsu->kshift_color}}">■</font></td>
            </tr>
            </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='{{route('backend.shifts.shubetsu.regist')}}'" type="button" class="btn btn-sm btn-page"> <input value="登録" onclick="location.href='{{route('backend.shifts.shubetsu.regist_save')}}'" type="button" class="btn btn-sm btn-page">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  