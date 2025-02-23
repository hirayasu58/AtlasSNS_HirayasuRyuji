<x-login-layout>

  <div class='post-container'>
    <p><figure><img src="{{ asset('/storage/' . $user->icon_image) }}" class="other-icon img-profile-size"></figure></p>
    <div class="otherUser-profile">
      <div class='otherUser-name'>
        <label for="name">ユ－ザ－名</label>
        <div class='other-username'>{{ $user->username }}</div>
      </div>
      <div class='otherUser-bio'>
        <label for="bio">自己紹介</label>
        <div class='other-bio'>{{ $user->bio }}</div>
      </div>
    </div>

    @if (Auth::user()->isFollowing($user->id))
    <!-- ↑フォローしている相手だったらtrue。 -->
    <!-- Auth::user()で自分のIDがfollowing_idにあるうえで、相手のIDがfollowed_idがあるかどうか -->
      <form action="{{ route('follows.un_follow') }}" method="post" class="other-form">
        @csrf
        <input type="hidden" name="un_follow_id" value="{{ $user->id }}">
          <button type="submit" class="btn btn-danger other-btn">
            フォロー解除
          </button>
      </form>
    @else
    <!-- ↑フォローしてないorフォロー外したら -->
      <form action="{{ route('follows.follow') }}" method="post" class="other-form">
        @csrf
        <input type="hidden" name="follow_id" value="{{ $user->id }}">
          <button type="submit" class="btn btn-primary other-btn">
            フォローする
          </button>
      </form>
    @endif

  </div>

  @foreach ($posts as $post)
    <div class='post-content'>
      <p class='user-icon'><figure><img src="{{ asset('storage/' . $post->user->icon_image) }}" class="icon-img img-size"></figure></p>
      <div class="post-name-post">
      <p class='post-username'>{{ $post->user->username }}</p>
      <p class='post-post'>{{ $post->post }}</p>
      </div>
      <p class='post-updated_at'>{{ $post->updated_at }}</p>
    </div>
  @endforeach

</x-login-layout>
