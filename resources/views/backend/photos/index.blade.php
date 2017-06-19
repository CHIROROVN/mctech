@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
      <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>写真講習　＞　検索・一覧</h3>
          <table class="table table-bordered treatment2-list">
            <tr>
              <td width="8%" class="col-title">種類</td>
              <td width="70%"><select class="form-control form-control--auto mar-left10">
                <option>レジン築盛</option>
                  <option>レジン築盛</option>
                  <option>レジン築盛</option>
                  <option>レジン築盛</option>
                </select>
                　　　　
                <input value="検索" type="button" class="btn btn-sm btn-page  mar-left10">
              </td>
            </tr>
          </table>
          <input value="新規登録"onClick="location.href='manage_photo_in.html'" type="button" class="btn btn-sm btn-page">
          <table class="table table-bordered table-striped treatment2-list">
            <tr>
              <td width="28%"  class="col-title">種類</td>
              <td width="72%"  class="col-title">価格</td>
              <td width="28%"  class="col-title">詳細</td>
            </tr>
            <tr>
              <td>レジン築盛</td>
              <td align="right">3,000</td>
              <td><input value="詳細" onClick="location.href='manage_photo_detail.html'" type="button" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
            <tr>
              <td>レジン築盛</td>
              <td align="right">3,000</td>
              <td><input value="詳細" onClick="location.href='manage_photo_detail.html'" type="button" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
            <tr>
              <td>レジン築盛</td>
              <td align="right">3,000</td>
              <td><input value="詳細" onClick="location.href='manage_photo_detail.html'" type="button" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
            <tr>
              <td>レジン築盛</td>
              <td align="right">3,000</td>
              <td><input value="詳細" onClick="location.href='manage_photo_detail.html'" type="button" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
          </table>
          <div class="col-md-12 text-center pagination">
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href=''">&lt; 前の30件</button>&ensp;&ensp;&ensp;
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href=''">次の30件 &gt;</button>
            </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  