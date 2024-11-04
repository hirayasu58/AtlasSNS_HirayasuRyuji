<x-login-layout>

<!-- {{ Form::open(['url' => 'route(profile)', 'method' => 'get' ]) }}
  <div class="profile-container">
    <img src="{{ asset('/public/images/icon1.png') }}" class="profile-icon-img">

    <div class="profile-edit">
    {{ Form::label('ユーザー名') }}
    {{ Form::text('inputName', null, ['class'= 'profile-name', 'placeholder'='{{ Auth::user()->$fillable()->username() }}']) }}
    <br>

    {{ Form::label('メールアドレス') }}
    {{ Form::email('inputEmail', null, ['class'='profile-email', 'placeholder'='{{ Auth::user()->$fillable()->email() }}']) }}
    <br>

    {{ Form::label('パスワード') }}
    {{Form::password('inputPassword', ['class' => 'profile-password', 'placeholder' => '{{ Auth::user()->$fillable()->password() }}'])}}
    <br>

    {{ Form::label('パスワード確認') }}
    {{Form::password('inputPassword', ['class' => 'profile-password', 'placeholder' => '{{ Auth::user()->$fillable()->password() }}'])}}
    <br>

    {{ Form::label('自己紹介') }}
    {{ Form::text('inputSelfIntroduction', null, ['class'= 'profile-self-introduction', 'placeholder'='']) }}
    <br>

    {{ Form::label('アイコン画像') }}
    {{Form::file('image', ['class'=>'profile-image',])}}
    <br>

    {{ Form::token() }}

    </div>
  </div>

{{ Form::close() }} -->

</x-login-layout>
