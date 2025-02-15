<x-login-layout>

  <div class="follower-list">
    <h1>フォロワーリスト</h1>
    <div class="follower_icon">
      @foreach ($followed as $followed)
        <a href="profiles/{{$followed->id}}/otherProfile" name="otherProfileId"><img src="{{ asset('storage/' .$followed->icon_image) }}" alt="フォロワーアイコン" class="img-size"></a>
      @endforeach
    </div>
  </div>
    @foreach ($followed_posts as $post)
        <div class='post-list'>
          <p class='user-icon'><a href="profiles/{{$post->user->id}}/otherProfile" name="otherProfileId"><img src="{{ asset('storage/' . $post->user->icon_image) }}" class="icon-img img-size"></a></p>
          <p class='post-username'>{{ $post->user->username }}</p>
          <p class='post-post'>{{ $post->post }}</p>
          <p class='post-created_at'>{{ $post->created_at }}</p>
        </div>
    @endforeach

</x-login-layout>
