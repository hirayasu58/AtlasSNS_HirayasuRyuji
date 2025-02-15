<x-logout-layout>

    <!-- フォームは同じページ内に送る。 -->
{!! Form::open(['url' => 'register']) !!}

<div class="register-container">

<h2>新規ユーザー登録</h2>

{{ Form::label('username','ユーザー名', ['class' => 'label password-username-label']) }}
{{ Form::text('username',null,['class' => 'form-text']) }}

{{ Form::label('email','メールアドレス', ['class' => 'label email-pass-label']) }}
{{ Form::email('email',null,['class' => 'form-text']) }}

{{ Form::label('password','パスワード', ['class' => 'label password-username-label']) }}
{{ Form::password('password',['class' => 'form-text']) }}

{{ Form::label('password_confirmation','パスワード確認', ['class' => 'label email-pass-label']) }}
{{ Form::password('password_confirmation',['class' => 'form-text']) }}

{{ Form::submit('新規登録',['class'=>'btn btn-danger login-register-btn']) }}

<a href="login"><p class="login-back-message">ログイン画面へ戻る</p></a>

</div>

{!! Form::close() !!}

<!-- @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif -->


</x-logout-layout>
