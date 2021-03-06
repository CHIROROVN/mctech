@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>写真管理　＞　　削除完了</h3>
          <p>以下の内容を削除しました。</p>
           <table class="table table-bordered treatment2-list">
            <tr>
              <td class="col-title">種類</td>
              <td>{{$photo->photo_name}}</td>
            </tr>
            <tr>
              <td class="col-title">価格</td>
              <td>{{number_format($photo->photo_price)}}</td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="一覧へ戻る" onclick="location.href='{{route('backend.photos.index')}}'" type="button" class="btn btn-sm btn-page">
            </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  