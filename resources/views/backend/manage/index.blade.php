@extends('backend.layouts')

@section('content')
    <!--PAGE CONTENT -->
    <section id="page">
      <div class="container">
        <div class="row content-page">
          <h3>管理</h3>
          <ul class="list-manage">
            <li>
              <h4>装置管理</h4>
              <p>├<a href="{{ route('backend.materials.regist') }}">登録</a></p>
              <p>└<a href="{{ route('backend.materials.index') }}">検索・一覧</a></p>
            </li>
            <li>
              <h4>オプション管理</h4>
              <p>├<a href="{{ route('backend.options.regist') }}">登録</a></p>
              <p>└<a href="{{ route('backend.options.index') }}">検索・一覧</a></p>
            </li>
            <li>
              <h4>外注医院管理</h4>
              <p>├<a href="{{ route('backend.hospitals.regist') }}">登録</a></p>
              <p>└<a href="{{ route('backend.hospitals.index') }}">検索・一覧</a></p>
              <p>&nbsp;</p>
            </li>
            <li>
              <h4>ユーザー管理</h4>
              <p>├<a href="{{ route('backend.users.regist') }}">登録</a></p>
              <p>└<a href="{{ route('backend.users.index') }}">検索・一覧</a></p>
              <p>&nbsp;</p>
            </li>
            
            <li>
              <h4>備品</h4>
              <p>├<a href="{{route('backend.fix.regist')}}">登録</a></p>
              <p>└<a href="{{route('backend.fix.index')}}">検索・一覧</a></p>
              <p>&nbsp;</p>
            </li>
            <li>
              <h4>写真講習</h4>
              <p>├<a href="{{route('backend.photos.regist')}}">登録</a></p>
              <p>└<a href="{{route('backend.photos.index')}}">検索・一覧</a></p>
              <p>&nbsp;</p>
            </li>
            <li>
              <h4>講習</h4>
              <p>├<a href="{{route('backend.lessons.regist')}}">登録</a></p>
              <p>└<a href="{{route('backend.lessons.index')}}">検索・一覧</a></p>
              <p>&nbsp;</p>
            </li>
            <li>
              <h4>シフト</h4>
              <p>├<a href="{{route('backend.shifts.index')}}">登録・一覧</a></p>
              <p>├<a href="{{route('backend.shifts.shubetsu.index')}}">シフト種別管理</a></p>
              <p>├<a href="{{route('backend.shifts.syukkin.index')}}">全体の出勤パターン管理</a></p>
              <p>└<a href="{{route('backend.shifts.holiday.index')}}">休日設定</a></p>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!--END PAGE CONTENT -->
@endsection  