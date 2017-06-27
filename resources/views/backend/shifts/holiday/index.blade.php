@extends('backend.layouts')

@section('content')
  <!--PAGE CONTENT -->
  <section id="page">
    <div class="container">
      <div class="row content-page">
        <h3>事務管理　＞　休日設定</h3>
        こちらの内容で、登録しますか？
            <div class="fillter">
            <div class="col-md-12 form-inline" style="text-align:center; display: inline-block;">
              {!! Form::open( ['id' => 'frmSearchPrev', 'method' => 'get', 'class'=>'form-group', 'route' => 'backend.shifts.holiday.index']) !!}
              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="{{splitDate($prevDate, '-')}}" id="prev" onclick="location.href='manage_shift_in_all.html'">&lt;&lt; 前月</button>&nbsp;&nbsp;&nbsp;&nbsp;
              {!! Form::close() !!}

              <span id="text-year">{{splitDate($ymShow, 'y')}}</span>年<span id="text-month">{{splitDate($ymShow, 'm')}}</span>月&nbsp;&nbsp;&nbsp;&nbsp;

              {!! Form::open( ['id' => 'frmSearchNext', 'method' => 'get', 'class'=>'form-group', 'route' => 'backend.shifts.holiday.index']) !!}
              <button type="submit" class="btn btn-sm btn-page no-border" name="next" value="{{splitDate($nextDate, '-')}}" id="next">翌月 &gt;&gt;
              </button>&nbsp;&nbsp;&nbsp;&nbsp;
              {!! Form::close() !!}
            </div>
          </div>
        <br>
        <div class="clear"></div>
        {!! Form::open( ['id' => 'frmHoliday', 'class' => 'form-horizontal','method' => 'post', 'route' => 'backend.shifts.holiday.index', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
        <table class=" table-bordered margin-bottom manage_shift_in" style="margin:10px auto; width:500px;">
          <tbody>
          @for($m=1; $m<=DayOfMonth(splitDate($ymShow, 'm'), splitDate($ymShow, 'y')); $m++)
          <?php $strDate =  splitDate($ymShow, 'y').'-'.c2Digit(splitDate($ymShow, 'm')).'-'.c2Digit($m);?>
            <tr>
              <th style="padding: 11px;">{{c2Digit(splitDate($ymShow, 'm'))}}/{{c2Digit($m)}}({{DayJp($strDate)}})</th>
              <td>
                <select name="working[]" style="width: 180px;">
                @if(count($working)>0)
                  @foreach($working as $wk)
                    <option value="{{$wk->working_id}}" style="color: {{$wk->working_color}};" @if($wk->working_id == working_by_date($strDate)) selected="" @endif>{{$wk->working_name}}</option>
                  @endforeach
                @endif
                </select>
                <input type="hidden" name="days[]" value="{{$strDate}}">
              </td>
            <tr>
            @endfor

          </tbody>
        </table>
        <div class="row margin-bottom">
            <div class="col-md-12 text-center">
              <input value="確認" type="submit" class="btn btn-sm btn-page">
            </div>
          </div>
          {!! Form::close() !!}
      </div>
    </div>
  </section>
  <!--END PAGE CONTENT -->
@endsection  