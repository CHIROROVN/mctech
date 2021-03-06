@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>備品管理　＞　登録　＞　確認　＞　登録完了</h3>
            <p>以上の内容で登録完了しました。</p>
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
        
        </div>
        <div class="col-md-12 text-center">
        <br>
            <input value="一覧へ戻る" onclick="location.href='{{route('backend.fix.index')}}'" type="button" class="btn btn-sm btn-page">
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  