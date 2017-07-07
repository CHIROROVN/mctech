@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
  <div class="container">
    <div class="row content-page">
      <h3>事務管理　＞　休日登録確認</h3>
      <p>こちらの内容で、登録しますか？ </p>
      <p>&nbsp;</p>
      <div class="fillter">
            <!-- <div class="col-md-12" style="text-align:center;">

              <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev">&lt;&lt; 前月</button>&nbsp;&nbsp;&nbsp;&nbsp;
              <span id="text-year">2017</span>年<span id="text-month">03</span>月&nbsp;&nbsp;&nbsp;&nbsp;
              <button type="submit" class="btn btn-sm btn-page no-border" name="next" value="" id="next">翌月 &gt;&gt;</button>&nbsp;&nbsp;&nbsp;&nbsp;
            </div> -->
            @if($message = Session::get('danger'))
            <div class="col-md-10" style="margin-left: 130px;">
                      <div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>{{$message}}</strong>
              </div>
            </div>
                  @elseif($message = Session::get('success'))
            <div class="col-md-10" style="margin-left: 130px;">
                      <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{$message}}</strong>
              </div>
            </div>
            @endif

          </div>
      <br>
      <div class="clear"></div>
      <table class=" table-bordered margin-bottom manage_shift_in" style="margin:10px auto; width:500px;">
        <tbody>
        @foreach($holiday as $kh => $valH)
          <tr>
            <th style="padding: 11px; width: 147px;">{{c2Digit(sDate($kh, 'm'))}}/{{c2Digit(sDate($kh, 'd'))}}({{DayJp($kh)}})</th>
            <td style="width: 311px;">
              @foreach($working as $kw => $valW)
                @if($valW->working_id == $valH)
                  <font color="{{$valW->working_color}}">{{$valW->working_name}}</font>
                @endif
              @endforeach
            </td>
          <tr>
          @endforeach

          <!-- <tr>
            <th style="padding: 11px;">03/02(木)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/03(金)</th>
            <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/04(土)</th>
            <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/05(日)</th>
            <td>休日</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/06(月)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/07(火)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/08(水)</th>
           <td>休日</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/09(木)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/10(金)</th>
            <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/11(土)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/12(日)</th>
           <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/13(月)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/14(火)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/15(水)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/16(木)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/17(金)</th>
            <td>休日</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/18(土)</th>
            <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/19(日)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/20(月)</th>
            <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/21(火)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/22(水)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/23(木)</th>
            <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/24(金)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/25(土)</th>
            <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/26(日)</th>
           <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/27(月)</th>
           <td>休日</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/28(火)</th>
            <td>通常パターン１</td>
          <tr>
            <th style="padding: 11px;">03/29(水)</th>
            <td>通常パターン１</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/30(木)</th>
          <td>通常パターン2</td>
          <tr>
          <tr>
            <th style="padding: 11px;">03/31(金)</th>
           <td>休日</td>
          <tr> -->
        </tbody>
      </table>
      
      
      <div class="row margin-bottom">
          <div class="col-md-12 text-center">
            <p>&nbsp;</p>
            <p>
              <input value="戻る" onclick="history.go(-1);return false;" type="button" class="btn btn-sm btn-page">
            　　
            <input value="登録する" onclick="location.href='{{route('backend.shifts.holiday.save')}}'" type="button" class="btn btn-sm btn-page">
            </p>
          </div>
        </div>
    </div>
  </div>
</section>
    <!--END PAGE CONTENT -->
@endsection  