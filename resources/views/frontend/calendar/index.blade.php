@extends('frontend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
  <div class="container">
    <div class="row content-page"><br>
        <h2 style="border:none;"><b>お知らせ</b></h2>
      <div style="border-bottom:solid 1px #ccc;border-top:solid 1px #ccc;margin-top:10px;padding:6px; width:340px; height: 110px;float:left;">
        <p>6月1日納品予定の技工物があります。</p>
        <p><a href="tech_list.html">【オーソネットワーク】5件</a></p>
        <p><a href="out_tech_list.html">【外注】5件</a></p>
        <div style="margin-top:6px;padding:6px;border-top:solid 1px #ccc;">シフト変更あり</div>
      </div>
<!--      <div style="border-bottom:solid 1px #ccc;border-top:solid 1px #ccc;padding:6px; height: 100px; width:340px; height: 100px; float:right;">
        <h2 style="border:none;"><b><font color="red">納品予定日を過ぎている技工物があります。</font></b></h2>
        <p>5月31日納品予定だったもの</p>
        <p>**********</p>
        <p>**********</p>
      </div>
-->      <div style="clear:both;"></div>
      <br>
      <div class="col-md-12" style="text-align:center;">
      <span style="display:block;">
        <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev" onclick="location.href='manage_shift_in_all.html'">&lt;&lt; 前月</button>
        &nbsp;&nbsp;<span class="calendar-month"> 2017年6月 </span>&nbsp;&nbsp;
        <button type="submit" class="btn btn-sm btn-page no-border" name="next" value="" id="next">翌月 &gt;&gt;</button>
      </span>
<span style="float:right;margin-top:4px;">    
          <select name="select" class="form-control form-control--small_u" style="width:10px;">
            <option value="">--</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
          </select>年
          <SELECT name="month" class="form-control form-control--small_u">
            <option value="">--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </SELECT>月
        <button type="submit" class="btn btn-sm btn-page no-border" name="next" value="" id="next">移動</button></div>
</span>
      <div class="table-responsive">
        <table class="table table-bordered margin-bottom" style="margin-top:6px;font-size:.9em;">
          <tbody>
            <tr>
              <td class="col-title" align="center">日</td>
              <td class="col-title" align="center">月</td>
              <td class="col-title" align="center">火</td>
              <td class="col-title" align="center">水</td>
              <td class="col-title" align="center">木</td>
              <td class="col-title" align="center">金</td>
              <td class="col-title" align="center">土</td>
            </tr>
            <tr>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">1</p></a></td>
              <td class="holiDay" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">2</p>
                </a>
                <ul class="text-calendar clear">
                  <a href="tech_list.html">
                  <li style="border:0;border-bottom: solid 1px #ccc;">オーソ</li>
                  <li style="border:0;border-bottom: solid 1px #ccc;">3名</li>
                  </a>
                </ul>
                <ul class="text-calendar clear mar-top">
                  <a href="out_tech_list.html">
                  <li style="border:0;">外注</li>
                  <li style="border:0;">1名</li>
                  </a>
                </ul>
                </a></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">3</a></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">4</p></a></td>
              <td class="holiDay" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">5</p></a></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">6</p></td>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">7</p></td>
            </tr>
            <tr>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">8</p></td>
              <td class="holiDay" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">9</p></td>
              <td style="position:relative;border:solid 4px #888;"><a href="t_o_list.html">
                <p class="u_p">10</p></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">11</p></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">12</p>
                </a>
                <ul class="text-calendar clear">
                  <a href="tech_list.html">
                  <li style="border:0;border-bottom: solid 1px #ccc;">オーソ</li>
                  <li style="border:0;border-bottom: solid 1px #ccc;">3名</li>
                  </a>
                </ul>
                <ul class="text-calendar clear mar-top">
                  <a href="out_tech_list.html">
                  <li style="border:0;">外注</li>
                  <li style="border:0;">1名</li>
                  </a>
                </ul>
                </a></td>
              <td class="holiDay" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">13</p></td>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">14</p></td>
            </tr>
            <tr>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">15</p></td>
              <td class="holiDay" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">16</p></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">17</p>
                </a>
                <ul class="text-calendar clear">
                  <a href="tech_list.html">
                  <li style="border:0;border-bottom: solid 1px #ccc;">オーソ</li>
                  <li style="border:0;border-bottom: solid 1px #ccc;">3名</li>
                  </a>
                </ul>
                <ul class="text-calendar clear mar-top">
                  <a href="out_tech_list.html">
                  <li style="border:0;">外注</li>
                  <li style="border:0;">1名</li>
                  </a>
                </ul>
                </a></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">18</p></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">19</p></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">20</p></td>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">21</p></td>
            </tr>
            <tr>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">22</p></td>
              <td class="holiDay" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">23</p></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">24</p>
                </a>
                <ul class="text-calendar clear">
                  <a href="tech_list.html">
                  <li style="border:0;border-bottom: solid 1px #ccc;">オーソ</li>
                  <li style="border:0;border-bottom: solid 1px #ccc;">3名</li>
                  </a>
                </ul>
                <ul class="text-calendar clear mar-top">
                  <a href="out_tech_list.html">
                  <li style="border:0;">外注</li>
                  <li style="border:0;">1名</li>
                  </a>
                </ul>
                </a></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">25</p></td>
              <td style="position:relative"><a href="t_o_list.html">
                <p class="u_p">26</p></td>
              <td class="holiDay" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">27</p></td>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">28</p></td>
            </tr>
            <tr>
              <td class="saturday" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">29</p><br>
<br>
<br>
<br>

</td>
              <td class="holiDay" style="position:relative"><a href="t_o_list.html">
                <p class="u_p">30</p></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
    <!--END PAGE CONTENT -->
@endsection  