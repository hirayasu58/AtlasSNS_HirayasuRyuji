<x-login-layout>

    {{ Form::open(['url' => 'posts/index' ]) }}
      <div class='post-container'>
        <img src="{{ asset('/storage/'. Auth::user()->icon_image) }}" class="icon-img img-size">
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
      <div class='post-list'>
        <p class='user-icon'><img src="{{ asset('storage/' . $post->user->icon_image) }}" class="icon-img img-size"></p>
        <p class='post-username'>{{ $post->user->username }}</p>
        <p class='post-post'>{{ $post->post }}</p>
        <p class='post-updated_at'>{{ $post->updated_at }}</p>
      @if (Auth::user()->id == $post->user_id)
      <!-- ↑ログインしているユーザー ==(比較) 投稿したユーザー -->
        <p class='post-edit'><a class="btn btn-post-edit" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img class='edit-img' src="{{ asset('/images/edit.png') }}" alt="">
        <!-- ↑post="{{ $post->post }}" post_id="{{ $post->id }}"で選択したコメントの情報をモーダルに反映される。postとidが送れればいいから、ここではURL(href)は未設定 -->
        </a></p>
        <!-- ↑編集 -->
        <p class='post-delete'><a class="btn btn-post-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
        <!-- /post/{$post->id}/deleteの/post/はなんでもいいし、無くてもいい。 -->
        <!-- URLはweb.phpにいくもの。ゴミ箱アイコン押すとpost/{id}/deleteへ -->
        <img class='delete-img' src="{{ asset('/images/trash-h.png') }}" alt="">
        <img class='delete-img-hover' src="{{ asset('/images/trash.png') }}" alt="">
        </a></p>
        <!-- ↑削除 -->
      @endif
      </div>
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
