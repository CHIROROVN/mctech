@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content content--menu">
          <div class="col-sm-7 col-md-7">
            <h2 style="border:none;">メニュー</h2>
            <div class="row">
<!--              <p style="line-height:30px;">
              </p>
-->              <ul class="list-menu">
                <li>
                  <a href="orthonet.html">
                    <img src="{{ asset('') }}public/backend/common/image/icon-menu1.png" alt="" />
                    <span>オーソネットワーク技工</span>
                  </a>
                </li>
                <li>
                  <a href="outsourcing.html">
                    <img src="{{ asset('') }}public/backend/common/image/icon-menu2.png" alt="" />
                    <span>外注技工</span>
                  </a>
                </li>
              </ul>
              <ul class="list-menu">
                <li>
                  <a href="offwork.html">
                    <img src="{{ asset('') }}public/backend/common/image/icon-menu3.png" alt="" />
                    <span>事務</span>
                  </a>
                </li>
                <li>
                  <a href="company_sales.html">
                    <img src="{{ asset('') }}public/backend/common/image/icon-menu4.png" alt="" />
                    <span>売上分析</span>
                  </a>
                 </li><br>

                <li>
                  <a href="{{route('backend.manage.index')}}">                
                    <img src="{{ asset('') }}public/backend/common/image/icon-menu5.png" alt="" />
                    <span>管理</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-5 col-md-5">
            <h2 style="border:none;">お知らせ</h2>
            <p><b>6月2日納品予定の技工物があります。</b><br>
            オーソ　**件<br>
            外注　　**件</p><br>

            <p><b><font color="red">納品予定日を過ぎている技工物があります。</font></b><br>
            6月1日　納品予定だったもの</p>
<br>
            <p><b>新着受注物あり</b><br>
            6月6日　**件<br>
            6月7日　**件</p><br>
            <p><b><a data-remodal-target="modal"><font color="red">6月1日シフト変更があります</font></a></b></p>
<br>
            <p><b><a href="tech_detail.html"><font color="red">納期変更あり</a></font></b><br>
            <!--            <ul class="menu-right">
              <li><a href="tech_list.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>オーソネットワーク △件</a></li>
              <li><a href="out_tech_lis1t.html"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>外注 △件</a></li>
            </ul>
-->          </div>
        </div>
      </div>
    </section>
          <!--modal-->
      <div class="remodal" data-remodal-id="modal" data-remodal-options="hashTracking:false"> 
        <!--<button data-remodal-action="close" class="remodal-close"></button>-->
        <h1>6月1日</h1>
        <table class="table table-bordered treatment2-list">
          <tr>
            <td class="col-title">木</td>
            <td>出勤パターン1</td>
            <td>備考内容</td>
          </tr>
          <tr>
            <td class="col-title">小</td>
            <td>出勤パターン2</td>
            <td>備考内容</td>
          </tr>
          <tr>
            <td class="col-title">野&nbsp;<span style="color:#FF9326;">★</span></td>
            <td></td>
            <td>備考内容</td>
          </tr>
          <tr>
            <td class="col-title">岡</td>
            <td>ちゅーりっぷ</td>
            <td>備考内容</td>
          </tr>
          <tr>
            <td class="col-title">明</td>
            <td>出勤パターン1</td>
            <td>備考内容</td>
          </tr>
          <tr>
            <td class="col-title">大</td>
            <td>出勤パターン2</td>
            <td>備考内容</td>
          </tr>
          <tr>
            <td class="col-title">皆&nbsp;<span style="color:#FF9326;">★</span></td>
            <td></td>
            <td>備考内容</td>
          </tr>
        </table>
        </p>
        <button data-remodal-action="confirm" class="remodal-confirm">閉じる</button>
      </div>
    <!--END PAGE CONTENT -->
@endsection  