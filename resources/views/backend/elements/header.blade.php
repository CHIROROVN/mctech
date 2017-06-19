<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MC：技工物管理システム</title>
<link href="{{ asset('') }}public/backend/common/css/import.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('') }}public/backend/js/remodal/remodal.css">
<link rel="stylesheet" href="{{ asset('') }}public/backend/js/remodal/remodal-default-theme.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('') }}public/backend/js/remodal/remodal.min.js"></script>
</head>
<body>
  <!-- Header -->
    <header>
      <div class="container-fulid">
        <div class="row">
          <div class="col-md-6">
            <span class="mar-right"><img src="{{ asset('') }}public/backend/common/image/med_logo.png" /></span>
            
          </div>
          <div class="col-md-6 page-right mar-top" style="padding-top:0.8%;"><span>ようこそ、山田花子さん　</span>
            <input onclick="location.href='tech_calendar.html'" value="納期別カレンダー" type="button" class="btn btn-sm btn-header">
            <input type="button" class="btn btn-sm btn-header" name="button" onclick="location.href='{{route('backend.menu.index')}}'" value="メニューへ" />
            <input type="button" class="btn btn-sm btn-header" name="button" onclick="location.href='logout.html'" value="ログアウト" />
          </div>
        </div>
      </div>
    </header>
  <!-- End Header -->