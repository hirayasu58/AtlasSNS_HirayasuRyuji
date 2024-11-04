<x-login-layout>

{{ Form::open(['url' => 'route(search)' ]) }}
  <div>
    {{ Form::text('search',null,['id' => 'search', 'placeholder' => 'ユーザー名']) }}
    {{ Form::token() }}
    <button type='submit' class='search-button'><img src="{{ asset('/images/search.png') }}" alt="" ></button>
  </div>
{{ Form::close() }}

</x-login-layout>
