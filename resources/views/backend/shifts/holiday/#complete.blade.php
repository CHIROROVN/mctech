@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>事務管理　＞　休日登録完了      </h3>
          <p>登録が完了しました。 </p>
          <p>&nbsp;</p>
          <div class="fillter">
            <!-- <div class="col-md-12" style="text-align:center;">

                  <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev">&lt;&lt; 前月</button>&nbsp;&nbsp;&nbsp;&nbsp;
                  <span id="text-year">2017</span>年<span id="text-month">03</span>月&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="submit" class="btn btn-sm btn-page no-border" name="next" value="" id="next">翌月 &gt;&gt;</button>&nbsp;&nbsp;&nbsp;&nbsp;
                </div> -->
              </div>
          <br>
          <div class="clear"></div>
          <table class=" table-bordered margin-bottom manage_shift_in" style="margin:10px auto; width:500px;">
            <tbody>
             @foreach($holiday as $kh => $valH)
             <?php  $arrValH = explode('_', $valH);?>
              <tr>
                <th style="padding: 11px; width: 147px;">{{@c2Digit(sDate($kh, 'm'))}}/{{@c2Digit(sDate($kh, 'd'))}}({{DayJp($kh)}})</th>
                <td style="width: 311px;">
                  @foreach($working as $kw => $valW)
                    @if($valW->working_id == $arrVal[0])
                      <font color="{{$valW->working_color}}">{{$valW->working_name}}</font>
                    @endif
                  @endforeach
                </td>
              <tr>
              @endforeach
            </tbody>
          </table>

          <div class="row margin-bottom">
              <div class="col-md-12 text-center">
                <p>&nbsp;</p>
                <p>
                  <input value="一覧へ戻る" onclick="location.href='{{route('backend.shifts.holiday.index')}}'" type="button" class="btn btn-sm btn-page">
                </p>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  