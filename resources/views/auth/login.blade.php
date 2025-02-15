<x-logout-layout>

      <!-- フォームは同じページ内に送る。 -->
      {!! Form::open(['url' => 'login']) !!}

      <div class="login-container">

      <p class="login-message">AtlasSNSへようこそ</p>

      {{ Form::label('email','メールアドレス', ['class' => 'label email-pass-label']) }}
      {{ Form::text('email',null,['class' => 'form-text']) }}
      {{ Form::label('password','パスワード', ['class' => 'label password-username-label']) }}
      {{ Form::password('password',['class' => 'form-text']) }}

      {{ Form::submit('ログイン',['class'=>'btn btn-danger login-register-btn']) }}

      <a href="register"><p class="login-register-message">新規ユーザーの方はこちら</p></a>

      </div>

      {!! Form::close() !!}

</x-logout-layout>
