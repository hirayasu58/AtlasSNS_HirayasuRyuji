<x-login-layout>

  <div class='search-area'>

  {{ Form::open(['url' => 'users/search','method' => 'GET','class' => 'search-form']) }}
    <div class='search-bar'>
      {{ Form::text('keyword',null,['id' => 'search', 'placeholder' => 'ユーザー名']) }}
      {{ Form::token() }}
      <button type='submit' class='search-button'><img src="{{ asset('/images/search.png') }}" class='search-img' alt="" ></button>
      @if (!empty($keyword))
        <p class="search-word">検索ワード：{{ $keyword }}</p>
      @endif
    </div>
  {{ Form::close() }}

  @foreach ($users as $user)
    @if ($user->id !== Auth::user()->id)
    <!-- ↑自分のユーザー名が表示されないように -->
    <div class="search-container">
      <div class="search-result">
        <p class="user-icon"><figure><img src="{{ asset('storage/' .$user->icon_image) }}" class="icon-img-search img-size"></figure></p>
        <!-- ↑アイコンも各ユーザーのアイコンにしたい -->
        <p class="search-user_name">{{ $user->username }}</p>
      </div>

      @if (Auth::user()->isFollowing($user->id))
      <!-- ↑フォローしている相手だったらtrue。 -->
      <!-- Auth::user()で自分のIDがfollowing_idにあるうえで、相手のIDがfollowed_idがあるかどうか -->
        <form action="{{ route('follows.un_follow') }}" method="post" class="search-form">
          @csrf
          <input type="hidden" name="un_follow_id" value="{{ $user->id }}">
            <button type="submit" class="btn btn-danger btn-search">
              フォロー解除
            </button>
        </form>
      @else
      <!-- ↑フォローしてないorフォロー外したら -->
        <form action="{{ route('follows.follow') }}" method="post" class="search-form">
          @csrf
          <input type="hidden" name="follow_id" value="{{ $user->id }}">
            <button type="submit" class="btn btn-primary btn-search">
              フォローする
            </button>
        </form>
      @endif
    </div>
    @endif
  @endforeach

  </div>

</x-login-layout>
