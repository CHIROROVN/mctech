@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>講習　＞　検索・一覧</h3>
          <table class="table table-bordered treatment2-list">
            <tr>
              <td width="8%" class="col-title">種類</td>
              <td width="70%"><select class="form-control form-control--auto mar-left10">
                <option>写真</option>
                  <option>講習</option>
                  <option>３回コース</option>
                
                </select>
                　　　　
                <input value="検索" type="button" class="btn btn-sm btn-page  mar-left10">
              </td>
            </tr>
          </table>
          <input value="新規登録"onClick="location.href='manage_lesson_in.html'" type="button" class="btn btn-sm btn-page">
          <table class="table table-bordered table-striped treatment2-list">
            <tr>
              <td width="28%"  class="col-title">種類</td>
              <td width="72%"  class="col-title">価格</td>
              <td width="72%"  class="col-title">詳細</td>
            </tr>
            <tr>
              <td>写真</td>
              <td align="right">3,000</td>
              <td><input value="詳細" type="button" onclick="location.href='manage_lesson_detail.html'" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
            <tr>
              <td>講習</td>
              <td align="right">3,000</td>
              <td><input value="詳細" type="button" onclick="location.href='manage_lesson_detail.html'" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
            <tr>
              <td>３回コース</td>
              <td align="right">3,000</td>
              <td><input value="詳細" type="button" onclick="location.href='manage_lesson_detail.html'" class="btn btn-sm btn-page  mar-left10"></td>
            </tr>
            
          </table>
          <div class="col-md-12 text-center pagination">
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='manage_shift_in_all.html'">&lt; 前の30件</button>&ensp;&ensp;&ensp;
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='manage_shift_in_all.html'">次の30件 &gt;</button>
            </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  