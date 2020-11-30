<header>
    <nav class="site-header sticky-top py-2 bg-dark">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <i class="fa fa-book text-light mr-3" aria-hidden="true"></i>
                <strong class="text-light">Send</strong>
            </a>
            @if (Route::has('login'))
            <div class="top-right links pt-1">
                @auth
               
                  <a href="{{ route('logout') }}" class="btn btn-outlinelight d-none d-md-inline-block mr-2">ログアウト</a>

                  <a href="{{ route('post.index') }}" class="btn btn-outline-light  d-none d-md-inline-block">申し送り一覧</a>
                </ul>
                @else
                    <a href="{{ route('admin.login') }}" class="btn btn-outline-light d-none d-md-inline-block mr-2">管理者ログイン</a>

                    <a href="{{ route('login') }}" class="btn btn-outline-light d-none d-md-inline-block mr-2 ">ログイン</a>

                    <a href="{{ route('register')}}" class="btn btn-outline-light d-none d-md-inline-block">登録</a>
                @endauth
            </div>
            </div>
            @endif
        </div>
    </nav>
</header>