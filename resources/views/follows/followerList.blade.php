<x-login-layout>

  <div class="follower-icon-list">
    <h1 class="list-title">フォロワーリスト</h1>
    <div class="follower-list">
      @foreach ($followed as $followed)
        <div class="follower_icon">
          <a href="profiles/{{$followed->id}}/otherProfile" name="otherProfileId"><figure><img src="{{ asset('storage/' .$followed->icon_image) }}" alt="フォロワーアイコン" class="img-size"></figure></a>
        </div>
      @endforeach
    </div>
  </div>
    @foreach ($followed_posts as $post)
        <div class='post-content'>
          <a href="profiles/{{$post->user->id}}/otherProfile" name="otherProfileId"><p class='user-icon'><figure><img src="{{ asset('storage/' . $post->user->icon_image) }}" class="icon-img img-size"></figure></p></a>
          <div class="post-name-post">
          <p class='post-username'>{{ $post->user->username }}</p>
          <p class='post-post'>{{ $post->post }}</p>
          </div>
          <p class='post-created_at'>{{ $post->created_at }}</p>
        </div>
    @endforeach

</x-login-layout>
