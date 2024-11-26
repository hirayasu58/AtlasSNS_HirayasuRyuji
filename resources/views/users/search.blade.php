<x-login-layout>

  <!-- <div class='search-area'> -->

  {{ Form::open(['url' => 'users/search','method' => 'GET' ]) }}
    <div class='search-bar'>
      {{ Form::text('keyword',null,['id' => 'search', 'placeholder' => 'ユーザー名']) }}
      {{ Form::token() }}
      <button type='submit' class='search-button'><img src="{{ asset('/images/search.png') }}" class='search-img' alt="" ></button>
      @if (!empty($keyword))
        <p>検索ワード：{{ $keyword }}</p>
      @endif
    </div>
  {{ Form::close() }}

  @foreach ($users as $user)
  @if ($user->id !== Auth::user()->id)
  <!-- ↑自分のユーザー名が表示されないように -->
  <div class="search-result">
    <p class="user-icon"><img src="{{ asset('/images/icon2.png') }}" class="icon-img-search"></p>
    <!-- ↑アイコンも各ユーザーのアイコンにしたい -->
    <p class="search-user_name">{{ $user->username }}</p>
  </div>
@endif
@endforeach

</x-login-layout>
