<nav class="site-header sticky-top py-2 bg-dark">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a href="#" class="navbar-brand d-flex align-items-center">
        <i class="fa fa-book text-light mr-3" aria-hidden="true"></i>
          <strong class="text-light">Send</strong>
        </a>
              @if (Route::has('login'))
                  <div class="top-right links">
                      @auth
                          <a href="{{ url('admin/home') }}" class="btn btn-outline-light mr-2">Home</a>
                          
                          <a href="{{ route('admin.logout') }}" class="btn btn-outline-light mr-2">ログアウト</a>
                          
                          <a href="{{ route('post.index') }}" class="btn btn-outline-light">申し送り一覧</a>  
                      @else
                          <a href="{{ route('admin.login') }}" class="btn btn-outline-light mr-2" >管理者ログイン</a>  
                          
                          <a href="{{ route('login') }}" class="btn btn-outline-light mr-2">ログイン</a>
                          
                          <a href="{{ route('register')}}" class="btn btn-outline-light">登録</a>
                      @endauth
                  </div>
              @endif
    </div>
  </nav>