@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>写真管理　＞　変更</h3>
          <table width="80%" class="table table-bordered treatment2-list">
            <tr>
            <tr>
              <td class="col-title">種類</td>
              <td width="83%">
<input type="input" class="form-control form-control--default" value="講習">   
                 
              </td>
              
            </tr>
            </tr>
            <tr>
              <td class="col-title">価格</td>
              <td colspan="7">
                <input type="input" value="￥2,000"class="form-control form-control--default">　</td>
            </tr>
                 
              </td>
              
            </tr>
            
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='manage_photo_detail.html'" type="button" class="btn btn-sm btn-page mar-left5"> <input value="確認" onclick="location.href='manage_photo_change_cnf.html'" type="button" class="btn btn-sm btn-page mar-left5">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  