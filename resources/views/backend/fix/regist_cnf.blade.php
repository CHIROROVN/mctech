@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>備品管理　＞　登録　＞　確認</h3>
          <p>こちらの内容で登録しますか？ </p>
           <table class="table table-bordered treatment2-list">
            <tr>
              <td class="col-title">名目</td>
              <td>{{@$categories[$equipment->equipment_category]}}</td>
            </tr>
            <tr>
              <td class="col-title">備品名</td>
              <td>{{$equipment->equipment_name}}</td>
            </tr>
            <tr>
              <td class="col-title">価格</td>
              <td>{{number_format($equipment->equipment_price)}}</td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="history.go(-1); return false;" type="button" class="btn btn-sm btn-page">
            <input value="登録" onclick="location.href='{{route('backend.fix.regist_save')}}'" type="button" class="btn btn-sm btn-page mar-left5">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  