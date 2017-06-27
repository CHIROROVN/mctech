@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <di	v class="container">
      {!! Form::open( ['id' => 'frmSyukkinRegist', 'class' => 'form-horizontal','method' => 'post', 'route' => 'backend.shifts.syukkin.regist', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
        <div class="row content-page">
          <h3>シフト　＞　全体の出勤パターン管理</h3>
          新規種別をご登録ください。
          <table class="table table-bordered treatment2-list" style="width:30%;margin:0 auto;float:none;margin-bottom:20px;">
            <tr>
              <td class="col-title" align="center">新規種別</td>
            </tr>
            <tr>
              <td width="50%" align="center">
                <input type="input" class="form-control form-control--default" name="working_name" value="@if(!empty(old('working_name'))){{old('working_name')}}@elseif(!empty($working->working_name)){{$working->working_name}}@endif">
                @if ($errors->first('working_name'))
                    <span class="help-block" for="working_name"><i class="fa fa-exclamation-triangle warning" aria-hidden="true"></i> {!! $errors->first('working_name') !!} </span>
                  @endif
              </td>
            </tr>
            <tr>
              <td align="center" >
                <select id="working_color" style="width:50px;" name="working_color">
                  <option style="color: #a50404;" value="#a50404" @if(old('working_color') == '#a50404') selected @elseif(isset($work->working_color) && $work->working_color == '#a50404') selected @endif>■</option>

                  <option style="color: #108B96;" value="#108B96" @if(old('working_color') == '#108B96') selected @elseif(isset($work->working_color) && $work->working_color == '#108B96') selected @endif>■</option>

                  <option style="color: #F39800;" value="#F39800" @if(old('working_color') == '#F39800') selected @elseif(isset($work->working_color) && $work->working_color == '#F39800') selected @endif>■</option>

                  <option style="color: #D0A6B1;" value="#D0A6B1" @if(old('working_color') == '#D0A6B1') selected @elseif(isset($work->working_color) && $work->working_color == '#D0A6B1') selected @endif>■</option>

                  <option style="color: #8FC31F;" value="#8FC31F" @if(old('working_color') == '#8FC31F') selected @elseif(isset($work->working_color) && $work->working_color == '#8FC31F') selected @endif>■</option>

                  <option style="color: #87C0CA;" value="#87C0CA" @if(old('working_color') == '#87C0CA') selected @elseif(isset($work->working_color) && $work->working_color == '#87C0CA') selected @endif>■</option>

                  <option style="color: #C93759;" value="#C93759" @if(old('working_color') == '#C93759') selected @elseif(isset($work->working_color) && $work->working_color == '#C93759') selected @endif>■</option>

                  <option style="color: #5A77AF;" value="#5A77AF" @if(old('working_color') == '#5A77AF') selected @elseif(isset($work->working_color) && $work->working_color == '#5A77AF') selected @endif>■</option>

                  <option style="color: #EE87B4;" value="#EE87B4" @if(old('working_color') == '#EE87B4') selected @elseif(isset($work->working_color) && $work->working_color == '#EE87B4') selected @endif>■</option>

                  <option style="color: #F6AE6A;" value="#F6AE6A" @if(old('working_color') == '#F6AE6A') selected @elseif(isset($work->working_color) && $work->working_color == '#F6AE6A') selected @endif>■</option>
                </select>
                </td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='{{route('backend.shifts.syukkin.index')}}'" type="button" class="btn btn-sm btn-page">
            <input value="確認" type="submit" class="btn btn-sm btn-page">
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </section>
    <script>
      $(document).ready(function(){
        $("#working_color").on("change", function (){
          $(this).removeAttr( "class" );
          var scolor = $(this).val();
          scolor = scolor.replace('#','');
           $(this).addClass('shift-color-'+scolor);
        });

      });
    </script>
    <!--END PAGE CONTENT -->
@endsection