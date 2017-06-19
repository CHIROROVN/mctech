@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>備品管理　＞　検索・一覧</h3>
 
          <select name="select" class="form-control form-control--small mar-left10">
                <option>技工</option>
                  <option>写真</option>
                  <option>その他</option>
                </select>
            
            
          </table>
          <input value="検索" type="button" class="btn btn-sm btn-page  mar-left10"><br><br>
                    <input value="新規登録"onClick="location.href='{{route('backend.fix.regist')}}'" type="button" class="btn btn-sm btn-page">

          <table width="91%" class="table table-bordered treatment2-list">
            <tr>
              <td align="center" class="col-title">名目</td>
              <td align="center" class="col-title">備品名</td>
              <td align="center" class="col-title">価格</td>
              <td align="center" class="col-title">詳細</td>
              
            </tr>
            <tr>
              <td>(装置)</td>
              <td>(オーソネットワーク・外注)</td>
              <td>(価格)</td>
              <td><input value="詳細" onClick="location.href='manage_fix_detail.html'" type="button" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
          </table>
          <div class="col-md-12 text-center pagination">
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href=''">&lt; 前の30件</button>&ensp;&ensp;&ensp;
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href=''">次の30件 &gt;</button>
            </div>
          <p>&nbsp;</p>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  