        <div id="head">
            <!-- "{{-- --}}"でlaravelの関数を使えるようにする。ルーティングでname'index'を用意しておく。 -->
            <h1><a href="{{ route('index') }}"><figure><img src="{{ asset('/images/atlas.png') }}" class="title"></figure></a></h1>
            <div class="side-user">
                <p class="user-name">{{ Auth::user()->username }} さん</p>
                <div id="accordion" class="accordion-container">
                    <p class="menu-btn"></p>
                    <nav class="accordion-nav">
                        <ul>
                            <li><a href="{{ route('index') }}">HOME</a></li>
                            <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                            <li><a href="{{ route('logout') }}">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
                <figure><img src="{{ asset('/storage/'. Auth::user()->icon_image) }}" class="icon-img img-navigation-size"></figure>
            </div>
        </div>
