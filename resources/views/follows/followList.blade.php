<x-login-layout>

  <div class="follow-list">
    <h1>フォローリスト</h1>
    <div class="follow_icon">
      @foreach ($followings as $following)
        <a href="{{ url('profile_users',$following->id) }}"><img src="{{ asset('storage/' .$following->icon_image) }}" alt="フォローアイコン"></a>
      @endforeach
    </div>
  </div>
    @foreach ($follows_posts as $post)
        <div class='post-list'>
          <p class='user-icon'><a href="/profile/ . {{ $post->user_id }}"><img src="{{ asset('storage/' . $post->user->icon_image) }}" class="icon-img" width="100" height="50"></a></p>
          <p class='post-username'>{{ $post->user->username }}</p>
          <p class='post-post'>{{ $post->post }}</p>
          <p class='post-created_at'>{{ $post->created_at }}</p>
        </div>
    @endforeach

</x-login-layout>
