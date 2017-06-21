@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>備品管理　＞　詳細</h3>
          <table class="table table-bordered treatment2-list">
            <tr>
              <td class="col-title">備品名</td>
              <td>{{@$categories[$equipment->equipment_category]}}</td>
            </tr>
            <tr>
              <td class="col-title">価格</td>
              <td>{{$equipment->equipment_name}}</td>
            </tr>
            <tr>
              <td class="col-title">名目</td>
              <td>{{number_format($equipment->equipment_price)}}</td>
            </tr>
          </table>
        </div>
        
        </div>
        <div class="col-md-12 text-center">
        <br>
            <input value="一覧へ戻る" onclick="location.href='{{route('backend.fix.index',['equipment_cat'=>$equipment_cat])}}'" type="button" class="btn btn-sm btn-page">　
            <input value="変更する" onclick="location.href='{{route('backend.fix.change', [$equipment->equipment_id, 'equipment_cat'=>$equipment_cat])}}'" type="button" class="btn btn-sm btn-page">　
            <input value="削除する" onclick="location.href='{{route('backend.fix.delete_cnf',[$equipment->equipment_id, 'equipment_cat'=>$equipment_cat])}}'" type="button" class="btn btn-sm btn-page">
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  