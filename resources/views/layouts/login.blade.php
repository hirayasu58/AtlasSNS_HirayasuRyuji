<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title></title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
  <!--スマホ,タブレット対応-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Scripts -->
  <!--サイトのアイコン指定-->
  <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
  <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
  <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
  <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
  <!--iphoneのアプリアイコン指定-->
  <link rel="apple-touch-icon-precomposed" href="画像のURL" />
  <!--OGPタグ/twitterカード-->
</head>

<body>
  <header>
    @include('layouts.navigation')
    <!-- ↑ headerは'navigation.blade.php'内に記述されてる -->
  </header>
  <!-- Page Content -->
  <div id="row">
    <div id="container">
      {{ $slot }}
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p class="side-username">{{ Auth::user()->username }}さんの</p>
        <div class="following-followed">
          <div>フォロー数</div>
          <div>{{ Auth::user()->following()->count() }}名</div>
          <!-- User.phpのAuthenticatableがAuthを継承しているから、User::classが使える。真ん中のはメソッド名。数を表示したいからcount()。 -->
        </div>
        <a href="{{ route('follow') }}"><p class="btn btn-primary side-btn">フォローリスト</p></a>
        <div class="following-followed">
          <div>フォロワー数</div>
          <div>{{ Auth::user()->followed()->count() }}名</div>
        </div>
        <a href="{{ route('follower') }}"><p class="btn btn-primary side-btn">フォロワーリスト</p></a>
      </div>
      <a href="{{ route('search') }}"><p class="btn btn-primary side-search-btn">ユーザー検索</p></a>
    </div>
  </div>
  <footer>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- <script src="{{ asset('js/app.js') }}"></script> -->
  <script src="{{ asset('js/script.js') }}"></script>
  <!-- ↑ asset()はpublicフォルダを指してる -->
</body>

</html>
