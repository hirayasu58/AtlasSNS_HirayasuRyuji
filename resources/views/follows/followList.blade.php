<x-login-layout>

  <div class="follow-list">
    <h1>フォローリスト</h1>
    <div class="follow_icon">
      @foreach ($followings as $following)
        <a href="profiles/{{$following->id}}/otherProfile" name="otherProfileId"><img src="{{ asset('storage/' .$following->icon_image) }}" alt="フォローアイコン" class="img-size"></a>
      @endforeach
    </div>
  </div>
    @foreach ($follows_posts as $post)
      <div class='post-list'>
        <p class='user-icon'><a href="profiles/{{$post->user->id}}/otherProfile" name="otherProfileId"><img src="{{ asset('storage/' . $post->user->icon_image) }}" class="icon-img img-size"></a></p>
        <p class='post-username'>{{ $post->user->username }}</p>
        <p class='post-post'>{{ $post->post }}</p>
        <p class='post-created_at'>{{ $post->created_at }}</p>
      </div>
    @endforeach

</x-login-layout>
