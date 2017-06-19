@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>写真管理　＞　　詳細          </h3>
          <table class="table table-bordered treatment2-list">
            <tr>
              <td class="col-title">種類</td>
              <td>講習</td>
            </tr>
            <tr>
              <td class="col-title">価格</td>
              <td>(価格）</td>
            </tr>
          </table>
        </div>
        
        </div>
        <div class="col-md-12 text-center">
        <br>
            <input value="一覧へ戻る" onclick="location.href='manage_photo_search.html'" type="button" class="btn btn-sm btn-page">　<input value="変更する" onclick="location.href='manage_photo_change.html'" type="button" class="btn btn-sm btn-page">　<input value="削除する" onclick="location.href='manage_photo_delete.html'" type="button" class="btn btn-sm btn-page">
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  