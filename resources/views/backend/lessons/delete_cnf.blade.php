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
              <td>{{$lesson->lecture_name}}</td>
            </tr>
            <tr>
              <td class="col-title">価格</td>
              <td>{{number_format($lesson->lecture_price)}}</td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='{{route('backend.lessons.detail', $lesson->lecture_id)}}'" type="button" class="btn btn-sm btn-page">
            <input value="削除する" onclick="location.href='{{route('backend.lessons.save_delete', $lesson->lecture_id)}}'" type="button" class="btn btn-sm btn-page mar-left5">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  