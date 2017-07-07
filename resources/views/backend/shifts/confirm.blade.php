@extends('backend.layouts')

@section('content')
	<!--PAGE CONTENT -->
<section id="page">
  <div class="container">
	<div class="row content-page">
	  <h3>事務管理　＞　技工シフト登録確認</h3>
	  <p>こちらの内容で、登録しますか？ </p>
	  <p>&nbsp;</p>
<!--       <div class="fillter">
		<div class="col-md-12" style="text-align:center;">

			  <button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="" id="prev">&lt;&lt; 前月</button>&nbsp;&nbsp;&nbsp;&nbsp;
			  <span id="text-year">2017</span>年<span id="text-month">03</span>月&nbsp;&nbsp;&nbsp;&nbsp;
			  <button type="submit" class="btn btn-sm btn-page no-border" name="next" value="" id="next">翌月 &gt;&gt;</button>&nbsp;&nbsp;&nbsp;&nbsp;
			</div>
		  </div> -->

	  <div class="clear"></div>
	  <table class=" table-bordered margin-bottom manage_shift_in" style="margin:10px auto;">
		<tbody>
		<tr>
			<th></th>
			@if(count(getListUser()) > 0)
				@foreach(getListUser() as $u_id => $u_name)
					<td style="background-color: rgba(23, 139, 139, .7); color:#fff;">{{$u_name}}</td>
				@endforeach
			@endif
		</tr>
		@for($day = 1; $day<=$max_day; $day++)
		<?php $strDate =  $year.'-'.c2Digit($month).'-'.c2Digit($day); ?>
		<tr>
			<th style="padding: 11px;">{{c2Digit($month)}}/{{c2Digit($day)}}({{DayJp($strDate)}})</th>
			@if(count(getListUser()) > 0)
				@foreach(getListUser() as $u_id => $u_name)
				<td>
					@foreach($shifts as $key => $val)
					<?php
						//Key
						$arrKey = explode('_', $key);
						if($arrKey[2] == 'shift'){
							//Value Shift
							$arrVal = explode('#', $val);
							$kshift_id = $arrVal[0];
							$kshift_color = '#'.$arrVal[1]
						}elseif($arrKey[2] == 'star'){
							$shift_star = $val;
						}else{
							$shift_memo = $val;
						}

						$u_id = $arrKey[1];
						$shift_date = $arrKey[0];
					 ?>
					 {{$kshift[]}}
					 11:00～22:00<br>	（備考内容）★

					@endforeach

				</td>
				@endforeach
			@endif
		<tr>
		@endfor
		  <!-- <tr>
			<th style="padding: 11px;">03/02(木)</th>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/03(金)</th>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/04(土)</th>
			<td>出勤パターン21<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
			<td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/05(日)</th>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/06(月)</th>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/07(火)</th>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
			<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/08(水)</th>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/09(木)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/10(金)</th>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/11(土)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/12(日)</th>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
					   <td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/13(月)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/14(火)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/15(水)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/16(木)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/17(金)</th>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
			<td><font color="red">休日</font></td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/18(土)</th>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/19(日)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/20(月)</th>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/21(火)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/22(水)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/23(木)</th>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/24(金)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/25(土)</th>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
						<td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/26(日)</th>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
					   <td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/27(月)</th>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/28(火)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
			<th style="padding: 11px;">03/29(水)</th>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
						<td>11:00～22:00<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/30(木)</th>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
					  <td>出勤パターン2<br>
			（備考内容）</td>
		  <tr>
		  <tr>
			<th style="padding: 11px;">03/31(金)</th>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		   <td><font color="red">休日</font></td>
		  <tr> -->
		</tbody>
	  </table>

	  <div class="row margin-bottom">
		  <div class="col-md-12 text-center">
			<p>&nbsp;</p>
			<p>
				<input value="戻る" onclick="history.go(-1);return false;" type="button" class="btn btn-sm btn-page">
			　　
				<input value="登録する" onclick="location.href='manage_shift_in_sent.html'" type="button" class="btn btn-sm btn-page">
			</p>
		  </div>
		</div>
	</div>
  </div>
</section>
	<!--/PAGE CONTENT -->
@endsection  