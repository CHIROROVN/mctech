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
            <div class="col-md-12" style="text-align:center;">

                  <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev">&lt;&lt; 前月</button>&nbsp;&nbsp;&nbsp;&nbsp;
                  <span id="text-year">2017</span>年<span id="text-month">03</span>月&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="submit" class="btn btn-sm btn-page no-border" name="next" value="" id="next">翌月 &gt;&gt;</button>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
              </div>
          <br>
          <div class="clear"></div>
          <table class=" table-bordered margin-bottom manage_shift_in" style="margin:10px auto; width:500px;">
            <tbody>
              <tr>
                <th style="padding: 11px;">03/01(水)</th>
                <td>休日</td>
              <tr>
              <tr>
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
              <tr>
            </tbody>
          </table>
          
          
          <div class="row margin-bottom">
              <div class="col-md-12 text-center">
                <p>&nbsp;            </p>
                <p>
                  <input value="一覧へ戻る" onclick="location.href='manage.html'" type="button" class="btn btn-sm btn-page">
                　　            </p>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  