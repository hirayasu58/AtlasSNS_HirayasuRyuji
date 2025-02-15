<x-login-layout>

  <div class='post-container'>
    <p><img src="{{ asset('/storage/' . $user->icon_image) }}" class="other-icon img-profile-size"></p>
    <div class='otherUser-name'>
      <label for="name">ユーザー名</label>
      <p class='other-username'>{{ $user->username }}</p>
    </div>
    <div class='otherUser-bio'>
      <label for="bio">自己紹介</label>
      <p class='other-bio'>{{ $user->bio }}</p>
    </div>

    @if (Auth::user()->isFollowing($user->id))
    <!-- ↑フォローしている相手だったらtrue。 -->
    <!-- Auth::user()で自分のIDがfollowing_idにあるうえで、相手のIDがfollowed_idがあるかどうか -->
      <form action="{{ route('follows.un_follow') }}" method="post">
        @csrf
        <input type="hidden" name="un_follow_id" value="{{ $user->id }}">
          <button type="submit" class="btn btn-danger">
            フォロー解除
          </button>
      </form>
    @else
    <!-- ↑フォローしてないorフォロー外したら -->
      <form action="{{ route('follows.follow') }}" method="post">
        @csrf
        <input type="hidden" name="follow_id" value="{{ $user->id }}">
          <button type="submit" class="btn btn-primary">
            フォローする
          </button>
      </form>
    @endif

  </div>

  @foreach ($posts as $post)
    <div class='othersUser-list'>
      <p class='user-icon'><img src="{{ asset('storage/' . $post->user->icon_image) }}" class="icon-img img-size"></p>
      <p class='post-username'>{{ $post->username }}</p>
      <p class='post-post'>{{ $post->post }}</p>
      <p class='post-updated_at'>{{ $post->updated_at }}</p>
    </div>
  @endforeach

</x-login-layout>
