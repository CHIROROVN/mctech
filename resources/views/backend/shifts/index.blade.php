@extends('backend.layouts')

@section('content')
		<!--PAGE CONTENT -->
	<section id="page">
	<div class="container">
		<div class="row content-page">
			<h3>事務管理　＞　技工シフト登録</h3>

			<p><input type="button" class="btn btn-sm btn-header" name="button" onclick="location.href='manage_shift_in_all.html'" value="全体を表示する" /></p>
						<div class="fillter">
							</div>
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

						<div class="col-md-12 form-inline" style="text-align:center; display: inline-block;">
							{!! Form::open( ['id' => 'frmSearchPrev', 'method' => 'get', 'class'=>'form-group', 'route' => 'backend.shifts.index']) !!}
							<button type="submit" class="btn btn-sm btn-page no-border" name="prev" value="{{splitDate($prevDate, '-')}}" id="prev" onclick="location.href='manage_shift_in_all.html'">&lt;&lt; 前月</button>&nbsp;&nbsp;&nbsp;&nbsp;
							{!! Form::close() !!}

							<span id="text-year">{{splitDate($ymShow, 'y')}}</span>年<span id="text-month">{{splitDate($ymShow, 'm')}}</span>月&nbsp;&nbsp;&nbsp;&nbsp;

							{!! Form::open( ['id' => 'frmSearchNext', 'method' => 'get', 'class'=>'form-group', 'route' => 'backend.shifts.index']) !!}
							<button type="submit" class="btn btn-sm btn-page no-border" name="next" value="{{splitDate($nextDate, '-')}}" id="next">翌月 &gt;&gt;
							</button>&nbsp;&nbsp;&nbsp;&nbsp;
							{!! Form::close() !!}
						</div>
					</div>
			<br>
			<div class="clear"></div>
			{!! Form::open( ['id' => 'frmShift', 'class' => 'form-horizontal','method' => 'post', 'route' => 'backend.shifts.index', 'enctype'=>'multipart/form-data', 'accept-charset'=>'utf-8']) !!}
			<table class=" table-bordered margin-bottom manage_shift_in" style="margin:10px auto; width:500px;">
				<tbody>
					<tr>
							<th></th>
							@if(count(getListUser()) > 0)
								@foreach(getListUser() as $u_id => $u_name)
									<td style="background-color: rgba(23, 139, 139, .7); color:#fff;">{{$u_name}}</td>
								@endforeach
							@endif
					</tr>

					@for($m=1; $m <= get_days_in_month(splitDate($ymShow, 'm'), splitDate($ymShow, 'y')); $m++)
						<?php $strDate =  splitDate($ymShow, 'y').'-'.c2Digit(splitDate($ymShow, 'm')).'-'.c2Digit($m);?>
						<input type="hidden" name="curr_date" value="{{splitDate($ymShow, 'y').'-'.c2Digit(splitDate($ymShow, 'm')).'-'.c2Digit($m)}}">
					<tr>
							<th style="padding: 11px;">{{c2Digit(splitDate($ymShow, 'm'))}}/{{c2Digit($m)}}({{DayJp($strDate)}})</th>
							@if(count(getListUser()) > 0)
								@foreach(getListUser() as $u_id => $u_name)
								<?php $shift = Shifts($strDate, $u_id);?>
									<td>
										<select style="margin-bottom:10px;" class="kshift shift-color-{{@KShiftColor(@$shift->kshift_id)}}" name="shift[{{$strDate}}_{{$u_id}}]" id="{{$strDate}}#kshift#{{$u_id}}">
											@if(!empty(Kshift()))
												@foreach(Kshift() as $kshift)
													<option style="color: {{$kshift->kshift_color}}" value="{{$kshift->kshift_id}}_{{$kshift->kshift_color}}" @if(!empty($shift) && $shift->kshift_id == $kshift->kshift_id)) selected @endif >{{$kshift->kshift_name}}</option>
												@endforeach
											@endif
										</select>
										<span style="margin:5px; padding-top:10px;">
											<a data-remodal-target="modal">
												<input type="button" value="備考登録" id="{{$strDate}}_sMemo_{{$u_id}}" class="btn shift_memo" style="color:#333;">
											</a>
										</span>&nbsp;<input type="checkbox" name="star[{{$strDate}}_{{$u_id}}]" value="1" @if(@$shift->shift_star == 1) checked @endif >★
										<input type="hidden" id="val_{{$strDate}}_sMemo_{{$u_id}}" name="memo[{{$strDate}}_{{$u_id}}]" value="{{@$shift->shift_memo}}">
									</td>

									<!--modal-->
										<div class="remodal" data-remodal-id="modal" data-remodal-options="hashTracking:false">
											<h1>備考</h1><br>
											<input type="hidden" id="memo${{$strDate}}$shift_memo${{$u_id}}" class="memoId" name="" value="">
											<textarea style="width:90%;height: 300px;" class="vShiftMemo" name="{{$strDate}}#shift_memo#{{$u_id}}"></textarea><br><br>
											<button data-remodal-action="confirm"  class="btn btn-sm btn-page no-border btnMemo">更新して閉じる</button>
										</div>
									<!--End modal-->

								@endforeach
							@endif
					</tr>
					@endfor

				</tbody>
			</table>

		<!--modal-->
			<!-- <div class="remodal2" data-remodal-id="modal2" data-remodal-options="hashTracking:false"> -->
				<!--<button data-remodal-action="close" class="remodal-close"></button>-->
				<!-- <h1>備考</h1><br>
				<textarea style="width:90%;height: 300px;"></textarea><br><br>
				<button data-remodal-action="confirm" class="btn btn-sm btn-page no-border">閉じる</button>
			</div> -->
		<!--End modal-->

			<div class="row margin-bottom">
					<div class="col-md-12 text-center">
						<input value="確認" type="submit" class="btn btn-sm btn-page">
					</div>
			</div>
			{!! Form::close() !!}

		</div>
	</div>
	</div>

</section>
		<!--END PAGE CONTENT -->
	<script>
		$( document ).ready(function() {
			$('.kshift').on("change", function (){
					$(this).removeAttr('class');
					var scolor = $(this).val();
					var arrColor = scolor.split('#', 2);
					$(this).addClass('kshift');
					$(this).addClass('shift-color-' + arrColor[1]);
				});

		});

		$('.shift_memo').click(function(){
			var idMemo = $(this).attr('id');
			$('.memoId').val(idMemo);
			console.log(idMemo);
			var oldMemo = $('#val_'+idMemo).val();
			$('textarea.vShiftMemo').val(oldMemo);
		});

		$('.btnMemo').click(function(){
			var valMemoPopup = $('textarea.vShiftMemo').val();
			var btn_memo_id = $('.memoId').val();
			$('#val_'+btn_memo_id).val(valMemoPopup);
		});

	</script>
@endsection  