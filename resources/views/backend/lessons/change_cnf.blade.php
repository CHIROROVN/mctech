@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>講習管理　＞　　変更確認</h3>
          <p>こちらの内容に変更しますか？ </p>
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
          <input value="戻る" onclick="location.href='{{route('backend.lessons.change', [$lecture_id])}}'" type="button" class="btn btn-sm btn-page">　<input value="変更する" onclick="location.href='{{route('backend.lessons.change_save', $lecture_id)}}'" type="button" class="btn btn-sm btn-page">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  