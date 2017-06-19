@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>シフト　＞　全体の出勤パターン管理</h3>
          <table class="table table-bordered treatment2-list" style="width:30%;margin:0 auto;float:none;margin-bottom:20px;">
<div style="margin:0 auto; width:30%;margin-bottom:4px;" align="right"><input value="新規登録" onclick="location.href='{{route('backend.shifts.syukkin.regist')}}'" type="button" class="btn btn-sm btn-page"></div>            <tr>
              <td class="col-title" align="center">現在登録中の種別</td>
<td class="col-title" align="center">色</td>
              <td class="col-title" align="center">変更</td>
              <td class="col-title" align="center">削除</td>
            </tr>
            <tr>
              <td width="50%" align="center">11:00～22:00</td>
<td width="50%" align="center"><font color="blue">■</font></td>
              <td width="10%" align="center"><input value="変更" onclick="location.href='shift_syukkin_change.html'" type="button" class="btn btn-sm btn-page"></td>
              <td width="10%" align="center"><input value="削除" onclick="location.href='shift_syukkin_delete.html'" type="button" class="btn btn-sm btn-page"></td>
            </tr>
            <tr>
              <td width="50%" align="center">09:30～20:30</td>
<td align="center"><font color="green">■</font></td>
              <td width="10%" align="center"><input value="変更" onclick="" type="button" class="btn btn-sm btn-page"></td>
              <td width="10%" align="center"><input value="削除" onclick="" type="button" class="btn btn-sm btn-page"></td>
            </tr>
            <tr>
              <td width="50%" align="center"><font color="red">休日</font></td>
<td align="center"><font color="red">■</font></td>
              <td width="10%" align="center"><input value="変更" onclick="" type="button" class="btn btn-sm btn-page"></td>
              <td width="10%" align="center"><input value="削除" onclick="" type="button" class="btn btn-sm btn-page"></td>
            </tr>
            <tr>
              <td width="50%" align="center">ちゅーりっぷ</td>
<td align="center"><font color="purple">■</font></td>
              <td width="10%" align="center"><input value="変更" onclick="" type="button" class="btn btn-sm btn-page"></td>
              <td width="10%" align="center"><input value="削除" onclick="" type="button" class="btn btn-sm btn-page"></td>
            </tr>
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