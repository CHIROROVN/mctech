@extends('backend.layouts')

@section('content')
  <!--PAGE CONTENT -->
  <section id="page">
    <div class="container">
      <div class="row content-page">
        <h3>事務管理　＞　休日設定</h3>
        こちらの内容で、登録しますか？
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
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/02(木)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/03(金)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/04(土)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/05(日)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/06(月)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/07(火)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/08(水)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/09(木)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/10(金)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/11(土)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/12(日)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/13(月)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/14(火)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/15(水)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/16(木)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/17(金)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/18(土)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/19(日)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/20(月)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/21(火)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/22(水)</th>
              <td><select>
                  <option><font color="red">休日</font></option>
                  <option>出勤パターン１</option>
                  <option>出勤パターン２</option>
                  <option>☆</option>
                  <option>ちゅーりっぷ</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/23(木)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/24(金)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/25(土)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/26(日)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/27(月)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/28(火)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/29(水)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/30(木)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
            <tr>
              <th style="padding: 11px;">03/31(金)</th>
              <td><select>
                  <option>11:00～22:00</option>
                  <option>09:30～20:30</option>
                  <option style="color:red">休日</option>
                </select></td>
            <tr>
          </tbody>
        </table>
        <div class="row margin-bottom">
            <div class="col-md-12 text-center">
              <input value="確認" onclick="location.href='manage_shift_holiday_in_cnf.html'" type="button" class="btn btn-sm btn-page">
            </div>
          </div>
      </div>
    </div>
  </section>
  <!--END PAGE CONTENT -->
@endsection  