<x-login-layout>

    {{ Form::open(['url' => 'posts/index' ]) }}
      <div class='post-container'>
        <img src="{{ asset('/storage/'. Auth::user()->icon_image) }}" class="icon-img">
        {{ Form::textarea('post_create',null,['id' => 'post', 'placeholder' => '投稿内容を入力してください。', 'rows' => '5']) }}
        {{ Form::token() }}
        <!-- {{ Form::input('hidden', 'post_user', '') }} -->
        <button type='submit' class='post-button'><img src="{{ asset('/images/post.png') }}" alt="" ></button>
      </div>
    {{ Form::close() }}

    @foreach ($posts as $post)
      <div class='post-list'>
        <p class='user-icon'><img src="{{ asset('/storage/'. Auth::user()->icon_image) }}" class="icon-img"></p>
        <p class='post-user_id'>{{ $post->user_id }}</p>
        <p class='post-post'>{{ $post->post }}</p>
        <p class='post-updated_at'>{{ $post->updated_at }}</p>
      @if (Auth::user()->id == $post->user_id)
      <!-- ↑ログインしているユーザー ==(比較) 投稿したユーザー -->
        <p class='post-edit'><a class="btn btn-post-edit" href=""><img class='edit-img' src="{{ asset('/images/edit.png') }}" alt=""></a></p>
        <p class='post-delete'><a class="btn btn-post-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
        <!-- /post/{$post->id}/deleteの/post/はなんでもいいし、無くてもいい。 -->
        <!-- URLはweb.phpにいくもの。ゴミ箱アイコン押すとpost/{id}/deleteへ -->
        <img class='delete-img' src="{{ asset('/images/trash-h.png') }}" alt="">
        <img class='delete-img-hover' src="{{ asset('/images/trash.png') }}" alt="">
        </a></p>
      @endif
      </div>
    @endforeach

</x-login-layout>
