@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
      {!! Form::open( ['id' => 'frmShubetsuChange', 'class' => 'form-horizontal','method' => 'post', 'route' =>['backend.shifts.shubetsu.change', $kshift_id], 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
        <div class="row content-page">
          <h3>シフト　＞　全体の出勤パターン管理</h3>
          <table class="table table-bordered treatment2-list" style="width:50%;margin:0 auto;float:none;margin-bottom:20px;">
            <tr>
              <td class="col-title" align="center" style="width:30%;">現在登録中の種別</td>
              <td class="col-title" align="center" style="width:30%;">変更後の種別</td>
              <td class="col-title" align="center" style="width:30%;">変更後の色</td>
            </tr>
            <tr>
              <td width="30%" align="center"><font color="{{$shubetsu->kshift_color}}">{{$shubetsu->kshift_name}}</font></td>
              <td width="30%" align="center">
              <input type="input" class="form-control form-control--default" name="kshift_name" value="@if(old('kshift_name')){{old('kshift_name')}}@else{{$shubetsu->kshift_name}}@endif">
                  @if ($errors->first('kshift_name'))
                    <span class="help-block" for="kshift_name"><i class="fa fa-exclamation-triangle warning" aria-hidden="true"></i> {!! $errors->first('kshift_name') !!} </span>
                  @endif
              </td>
               <td align="center">
                  <select id="kshift_color" style="width:50px;" name="kshift_color">

                    <option style="color: #a50404;" value="#a50404" @if(old('kshift_color') == '#a50404') selected @elseif($shubetsu->kshift_color == '#a50404') selected @endif>■</option>

                    <option style="color: #108B96;" value="#108B96" @if(old('kshift_color') == '#108B96') selected @elseif($shubetsu->kshift_color == '#108B96') selected @endif>■</option>

                    <option style="color: #F39800;" value="#F39800" @if(old('kshift_color') == '#F39800') selected @elseif($shubetsu->kshift_color == '#F39800') selected @endif>■</option>

                    <option style="color: #D0A6B1;" value="#D0A6B1" @if(old('kshift_color') == '#D0A6B1') selected @elseif($shubetsu->kshift_color == '#D0A6B1') selected @endif>■</option>

                    <option style="color: #8FC31F;" value="#8FC31F" @if(old('kshift_color') == '#8FC31F') selected @elseif($shubetsu->kshift_color == '#8FC31F') selected @endif>■</option>

                    <option style="color: #87C0CA;" value="#87C0CA" @if(old('kshift_color') == '#87C0CA') selected @elseif($shubetsu->kshift_color == '#87C0CA') selected @endif>■</option>

                    <option style="color: #C93759;" value="#C93759" @if(old('kshift_color') == '#C93759') selected @elseif($shubetsu->kshift_color == '#C93759') selected @endif>■</option>

                    <option style="color: #5A77AF;" value="#5A77AF" @if(old('kshift_color') == '#5A77AF') selected @elseif($shubetsu->kshift_color == '#5A77AF') selected @endif>■</option>

                    <option style="color: #EE87B4;" value="#EE87B4" @if(old('kshift_color') == '#EE87B4') selected @elseif($shubetsu->kshift_color == '#EE87B4') selected @endif>■</option>

                    <option style="color: #F6AE6A;" value="#F6AE6A" @if(old('kshift_color') == '#F6AE6A') selected @elseif($shubetsu->kshift_color == '#F6AE6A') selected @endif>■</option>
                </select>

                </td>
            </tr>
          </table>
        </div>
        <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <input value="戻る" onclick="location.href='{{route('backend.shifts.shubetsu.index')}}'" type="button" class="btn btn-sm btn-page">
            <input value="確認" type="submit" class="btn btn-sm btn-page">
          </div>
        </div>
        {!! Form::close() !!}
      </div>
    </section>
    <!--END PAGE CONTENT -->
    <script>
      $(document).ready(function(){
        var old_color = "{{$shubetsu->kshift_color}}";

        // if("{{old('kshift_color')}}") != null){
        //   old_color = "{{old('kshift_color')}}";
        // }else{
        //   old_color = "{{$shubetsu->kshift_color}}";
        // }

        $("#kshift_color").addClass('shift-color-'+old_color.replace('#',''));
        $("#kshift_color").on("change", function (){
          $(this).removeAttr( "class" );
          var scolor = $(this).val();
          scolor = scolor.replace('#','');
           $(this).addClass('shift-color-'+scolor);
        });

      });
    </script>
@endsection  