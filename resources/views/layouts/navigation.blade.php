        <div id="head">
            <div class="side-user">
                <div id="accordion" class="accordion-container">
                                <!-- "{{-- --}}"でlaravelの関数を使えるようにする。ルーティングでname'index'を用意しておく。 -->
            <h1><a href="{{ route('index') }}"><img src="{{ asset('/images/atlas.png') }}" class="title"></a></h1>
                    <p class="user-name">〇〇さん</p>
                        <p class="menu-btn active"></p>
                            <nav>
                                <ul>
                                    <li><a class="home" href="{{ route('index') }}">ホーム</a></li>
                                    <li><a class="profile" href="{{ route('profile') }}">プロフィール</a></li>
                                    <li><a class="logout" href="{{ route('login') }}">ログアウト</a></li>
                                </ul>
                            </nav>
                    <img src="{{ asset('/images/icon1.png') }}">
                </div>
            </div>
        </div>
