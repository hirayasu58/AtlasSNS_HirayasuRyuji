<x-login-layout>

    {{ Form::open(['url' => 'posts/index' ]) }}
      <div class='post-container'>
        <figure><img src="{{ asset('/storage/'. Auth::user()->icon_image) }}" class="icon-img img-size"></figure>
        {{ Form::textarea('post_create',null,['id' => 'post', 'placeholder' => '投稿内容を入力してください。', 'rows' => '5']) }}
        {{ Form::token() }}
        <!-- {{ Form::input('hidden', 'post_user', '') }} -->
        <button type='submit' class='post-button'><img src="{{ asset('/images/post.png') }}" alt="" ></button>
      </div>
    {{ Form::close() }}

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

  @foreach ($posts as $post)
    <ul>
      <li class="post-list">
      <div class='post-content'>
        <div class='user-icon'><figure><img src="{{ asset('storage/' . $post->user->icon_image) }}" class="icon-img img-size"></figure></div>
        <div class="post-name-post">
          <div class='post-username'>{{ $post->user->username }}</div>
          <div class='post-post'>{{ $post->post }}</div>
        </div>
        <div class="post-time-btn">
          <div class='post-updated_at'>{{ $post->updated_at }}</div>
          @if (Auth::user()->id == $post->user_id)
          <!-- ↑ログインしているユーザー ==(比較) 投稿したユーザー -->
            <div class="post-btn">
              <div class='post-edit'><a class="btn btn-post-edit" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img class='edit-img' src="{{ asset('/images/edit.png') }}" alt="">
              <!-- ↑post="{{ $post->post }}" post_id="{{ $post->id }}"で選択したコメントの情報をモーダルに反映される。postとidが送れればいいから、ここではURL(href)は未設定 -->
              </a></div>
              <!-- ↑編集 -->
              <div class='post-delete'><a class="btn btn-post-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
              <!-- /post/{$post->id}/deleteの/post/はなんでもいいし、無くてもいい。 -->
              <!-- URLはweb.phpにいくもの。ゴミ箱アイコン押すとpost/{id}/deleteへ -->
              <img class='delete-img' src="{{ asset('/images/trash-h.png') }}" alt="">
              <img class='delete-img-hover' src="{{ asset('/images/trash.png') }}" alt="">
              </a></div>
              <!-- ↑削除 -->
            </div>
          @endif
        </div>
      </div>
      </li>
    </ul>
  @endforeach

    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
          <form action="/post/update" method="get">
          <!-- 既に送りたい値(↑の<a>から引っ張ってきた情報)は選択されているから/post/{{$post->id}}/updateじゃなくていい -->
            <textarea name="update_post" class="modal_post"></textarea>
              <input type="hidden" name="update_id" class="modal_id" value="">
              <input type="submit" value="">
            {{ csrf_field() }}
          </form>
        <a class="js-modal-close" href=""><img class='edit-img' src="{{ asset('/images/edit.png') }}" alt=""></a>
      </div>
    </div>

</x-login-layout>
