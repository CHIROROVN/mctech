@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>講習管理　＞　登録</h3>
          <table width="80%" class="table table-bordered treatment2-list">
            <tr>
            <tr>
              <td class="col-title">種類</td>
              <td width="83%">
<input type="input" class="form-control form-control--default">              </td>
              
            </tr>
            </tr>
            <tr>
              <td class="col-title">価格</td>
              <td colspan="7">
                <input type="input" class="form-control form-control--default">　</td>
            </tr>
                 
              </td>
              
            </tr>
            
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="確認" onclick="location.href='manage_lesson_in_cnf.html'" type="button" class="btn btn-sm btn-page mar-left5">
          </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  