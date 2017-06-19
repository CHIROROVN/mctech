@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>写真講習管理　＞　登録</h3>
          <table width="80%" class="table table-bordered treatment2-list">
            <tr>
            <tr>
              <td class="col-title">種類 <span class="note_required">※</span></td>
              <td width="83%">
                <input type="input" name="photo_name" value="{{old('photo_name')}}" class="form-control form-control--default">
              </td>
            </tr>
            </tr>
            <tr>
              <td class="col-title">価格 <span class="note_required">※</span></td>
              <td colspan="7">
                <input type="input" name="photo_price" value="{{old('photo_price')}}" class="form-control form-control--default">
              </td>
            </tr>
                 
              </td>
              
            </tr>
            
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="確認" onclick="location.href='manage_photo_in_cnf.html'" type="button" class="btn btn-sm btn-page mar-left5">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  