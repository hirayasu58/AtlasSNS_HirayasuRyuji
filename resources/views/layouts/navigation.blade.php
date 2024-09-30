        <div id="head">
            <!-- "{{-- --}}"でlaravelの関数を使えるようにする。ルーティングでname'index'を用意しておく。 -->
            <h1><a href="{{ route('index') }}"><img src="{{ asset('/images/atlas.png') }}" class="title"></a></h1>
            <div class="side-user">
                <p class="user-name">〇〇　さん</p>
                <div id="accordion" class="accordion-container">
                    <p class="menu-btn"></p>
                    <nav class="accordion-nav">
                        <ul>
                            <li><a href="{{ route('index') }}">HOME</a></li>
                            <li><a href="{{ route('profile') }}">プロフィール編集</a></li>
                            <li><a href="{{ route('login') }}">ログアウト</a></li>
                        </ul>
                    </nav>
                </div>
                <img src="{{ asset('/images/icon1.png') }}" class="icon-img">
            </div>
        </div>
