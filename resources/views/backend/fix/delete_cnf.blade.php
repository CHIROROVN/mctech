@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>講習管理　＞　　削除確認</h3>
          <p>こちらの内容を削除しますか？ </p>
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
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='manage_lesson_detail.html'" type="button" class="btn btn-sm btn-page">
            <input value="削除する" onclick="location.href='manage_lesson_delete_sent.html'" type="button" class="btn btn-sm btn-page mar-left5">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  