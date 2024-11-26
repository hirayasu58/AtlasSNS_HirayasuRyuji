<x-login-layout>

@section('content')
<div class="profile-container">
  <div class="update">
    {!! Form::open(['url' => '/profile/update') !!}
    @csrf
    {{Form::hidden('id',Auth::user()->id)}}
    <img src="{{ asset('/public/images/icon1.png') }}" class="profile-icon-img">
    <div class="update-form">
      <div class="update-block">
        <label for="name">ユーザー名</label>
        <input type="text" name="username" value="{{ Auth::user()->username }}">
      </div>
      <div class="update-block">
        <label for="mail">メールアドレス</label>
        <input type="email" name="mail" value="{{ Auth::user()->mail }}">
      </div>
      <div class="update-block">
        <label for="pass">パスワード</label>
        <input type="password" name="password" value="">
      </div>
      <div class="update-block">
        <label for="pass">パスワード確認</label>
        <input type="password" name="password_confirmation" value="">
      </div>
      <div class="update-block">
        <label for="bio">自己紹介</label>
        <input type="text" name="bio" value="{{ Auth::user()->bio }}">
      </div>
      <div class="update-block">
        <label for="icon">アイコン画像</label>
        <input type="file" name="images">
      </div>
      <input type="submit" class="btn btn-denger">
      {{ Form::token() }}
      {!! From::close() !!}
    </div>
  </div>
</div>

</x-login-layout>
