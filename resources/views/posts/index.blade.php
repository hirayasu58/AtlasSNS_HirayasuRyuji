<x-login-layout>

    {{ Form::open(['url' => 'posts/index' ]) }}
      <div class='post-container'>
        <img src="{{ asset('/images/icon1.png') }}" class="icon-img">
        {{ Form::textarea('new_post',null,['id' => 'post', 'placeholder' => '投稿内容を入力してください。', 'rows' => '5']) }}
        {{ Form::token() }}
        @foreach ($posts as $post)
        {{ Form::input('hidden', 'post_user', {{ $post->user_id }}) }}
        @endforeach
        <button type='submit' class='post-button'><img src="{{ asset('/images/post.png') }}" alt="" ></button>
      </div>
    {{ Form::close() }}

</x-login-layout>
