<x-login-layout>

  <div class="follow-list">
    <h1>フォローリスト</h1>
    <div class="follow_icon">
        @foreach ($followings as $following)
        <a><img src="{{ asset('storage/' .$following->icon_image) }}" alt="フォローアイコン"></a>
        @endforeach
    </div>
  </div>
    @foreach ($posts as $post)
      <div class='post-list'>
        <p class='user-icon'><img src="{{ asset('storage/' .$following->icon_image) }}" class="icon-img"></p>
        <p class='post-user_id'>{{ $post->user_id }}</p>
        <p class='post-post'>{{ $post->post }}</p>
        <p class='post-updated_at'>{{ $post->updated_at }}</p>
      </div>
    @endforeach

</x-login-layout>
