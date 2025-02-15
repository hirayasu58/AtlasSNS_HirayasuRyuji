<x-logout-layout>
  <div class="added-container">
    <div id="clear">
      <!-- 　↓セッションの受け取り -->
      <div class="welcome-message">
        <p>{{ session('username') }}さん</p>
        <p>ようこそ！AtlasSNSへ！</p>
      </div>
      <div class="added-message">
        <p>ユーザー登録が完了しました。</p>
        <p>早速ログインをしてみましょう。</p>
      </div>

      <a href="login"><p class="btn btn-danger login-added-btn ">ログイン画面へ</p></a>
    </div>
  </div>
</x-logout-layout>
