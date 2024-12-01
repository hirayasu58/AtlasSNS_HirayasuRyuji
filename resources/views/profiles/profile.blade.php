<x-login-layout>

@section('content')
<div class="profile-container">
  <div class="update">
    {{ Form::open(['url' => ['profile/update']]) }}
    @csrf
    {{Form::hidden('id',Auth::user()->id)}}
    <img src="{{ asset('/images/'. Auth::user()->icon_image1) }}" class="profile-icon-img">
    <div class="update-form">
      <div class="update-block">
        <label for="name">ユーザー名</label>
        <input type="text" name="username" value="{{ Auth::user()->username }}">
      </div>
      <div class="update-block">
        <label for="mail">メールアドレス</label>
        <input type="email" name="mail" value="{{ Auth::user()->email }}">
      </div>
      <div class="update-block">
        <label for="pass">パスワード</label>
        <input type="password" name="password" value="{{ Auth::user()->password }}">
      </div>
      <div class="update-block">
        <label for="pass">パスワード確認</label>
        <input type="password" name="password_confirmation" value="{{ Auth::user()->password }}">
      </div>
      <div class="update-block">
        <label for="bio">自己紹介</label>
        <input type="text" name="bio" value="{{ Auth::user()->bio }}">
      </div>
      <div class="update-block">
        <label for="icon">アイコン画像</label>
        <input type="file" name="images">
      </div>
    <button type='submit' class='update-button'>更新</button>
    {{ Form::token() }}
    From::close()
    @foreach($users as $user)
    <p>{{ $user->password }}</p>
    @endforeach
    </div>
  </div>
</div>

</x-login-layout>
