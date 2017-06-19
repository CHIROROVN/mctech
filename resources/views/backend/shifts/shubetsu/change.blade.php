@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>シフト　＞　全体の出勤パターン管理</h3>
          <table class="table table-bordered treatment2-list" style="width:50%;margin:0 auto;float:none;margin-bottom:20px;">
            <tr>
              <td class="col-title" align="center" style="width:30%;">現在登録中の種別</td>
              <td class="col-title" align="center" style="width:30%;">変更後の種別</td>
              <td class="col-title" align="center" style="width:30%;">変更後の色</td>
            </tr>
            <tr>
              <td width="30%" align="center">休日</td>
              <td width="30%" align="center"><input type="input" class="form-control form-control--default"></td>
               <td align="center"><select style="width:100px;">
                <option style="color:#a50404;" value="1">■</option>
                <option style="color:#108B96;" value="1">■</option>
                <option style="color:#F39800;" value="1">■</option>
                <option style="color:#D0A6B1;" value="1">■</option>
                <option style="color:#8FC31F;" value="1">■</option>
                <option style="color:#87C0CA;" value="1">■</option>
                <option style="color:#C93759;" value="1">■</option>
                <option style="color:#5A77AF;" value="1">■</option>
                <option style="color:#EE87B4;" value="1">■</option>
                <option style="color:#F6AE6A;" value="1">■</option>
                </select></td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='shift_shubetsu.html'" type="button" class="btn btn-sm btn-page">　　　<input value="確認" onclick="location.href='shift_shubetsu_change_cnf.html'" type="button" class="btn btn-sm btn-page">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  