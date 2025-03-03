<x-login-layout>

@section('content')
<div class="profile-container">
  <div class="update">
    <div>
      {{ Form::open(['url' => 'profile/update', 'enctype' => 'multipart/form-data']) }}
      @csrf
      {{Form::hidden('id',Auth::user()->id)}}
      <figure><img src="{{ asset('/storage/'. Auth::user()->icon_image) }}" class="profile-icon-img img-profile-size"></figure>
    </div>
    <div class="update-form">
      <div class="update-block">
        <label for="name">ユーザー名</label>
        <input type="text" name="username" value="{{ Auth::user()->username }}" id="name">
      </div>
      <div class="update-block">
        <label for="mail">メールアドレス</label>
        <input type="email" name="mail" value="{{ Auth::user()->email }}" id="mail">
      </div>
      <div class="update-block">
        <label for="pass">パスワード</label>
        <input type="password" name="password" value="" id="pass">
      </div>
      <div class="update-block">
        <label for="pass-confirmation">パスワード確認</label>
        <input type="password" name="password_confirmation" value="" id="pass-confirmation">
      </div>
      <div class="update-block">
        <label for="bio">自己紹介</label>
        <input type="text" name="bio" value="{{ Auth::user()->bio }}" id="bio">
      </div>
      <div class="update-block">
        <label for="icon-file">アイコン画像</label>
        <input type="file" name="icon_image" id="icon-file">
      </div>
    <button type='submit' class='btn btn-danger update-button'>更新</button>
    @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif
    {{ Form::token() }}
    {{ Form::close() }}
    </div>
  </div>
</div>

</x-login-layout>
