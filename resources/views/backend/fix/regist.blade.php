@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
      {!! Form::open( ['id' => 'frmFixAdd', 'class' => 'form-horizontal','method' => 'post', 'route' => 'backend.fix.regist', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
        <div class="row content-page">
          <h3>備品管理　＞　登録</h3>
          <table width="80%" class="table table-bordered treatment2-list">
            <tr>
              <td class="col-title">名目 <span class="note_required">※</span></td>
              <td width="83%">
                <p>
                  <input name="equipment_category" value="1" id="equipment_cat1" type="radio" @if(!empty(old('equipment_category') && old('equipment_category') == '1')) checked @endif> 
                  技工　　　
                  <input name="equipment_category" value="2" id="equipment_cat2" type="radio" @if(!empty(old('equipment_category') && old('equipment_category') == '2')) checked @endif> 
                  写真　　　
                <input name="equipment_category" value="3" id="equipment_cat3" type="radio" @if(!empty(old('equipment_category') && old('equipment_category') == '3')) checked @endif> その他 </p>
                 @if ($errors->first('equipment_category'))
                    <span class="help-block" for="equipment_category"><i class="fa fa-exclamation-triangle warning" aria-hidden="true"></i> {!! $errors->first('equipment_category') !!} </span>
                  @endif
              </td>
              
            </tr>
            <tr>
              <td width="17%" class="col-title">備品名 <span class="note_required">※</span></td>
              <td colspan="7">
                <input type="input" name="equipment_name" value="{{old('equipment_name')}}" class="form-control form-control--default">　
                  @if ($errors->first('equipment_name'))
                    <span class="help-block" for="equipment_name"><i class="fa fa-exclamation-triangle warning" aria-hidden="true"></i> {!! $errors->first('equipment_name') !!} </span>
                  @endif
              </td>
            </tr>
            <tr>
              <td class="col-title">価格 <span class="note_required">※</span></td>
              <td colspan="7">
                <input type="input" name="equipment_price" value="{{old('equipment_price')}}" class="form-control form-control--default">　
                @if ($errors->first('equipment_price'))
                    <span class="help-block" for="equipment_price"><i class="fa fa-exclamation-triangle warning" aria-hidden="true"></i> {!! $errors->first('equipment_price') !!} </span>
                  @endif
                </td>
            </tr>
            
            
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="確認" type="submit" class="btn btn-sm btn-page mar-left5">
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  