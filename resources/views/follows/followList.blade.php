<x-login-layout>

  <div class="follow-icon-list">
    <h1 class="list-title">フォローリスト</h1>
    <div class="follow-list">
      @foreach ($followings as $following)
        <div class="follow_icon">
          <a href="profiles/{{$following->id}}/otherProfile" name="otherProfileId"><figure><img src="{{ asset('storage/' .$following->icon_image) }}" alt="フォローアイコン" class="img-size"></figure></a>
        </div>
      @endforeach
    </div>
  </div>
    @foreach ($follows_posts as $post)
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
