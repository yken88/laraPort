<section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">@yield('title')</h1>
      <p class="lead text-muted">@yield('overview')</p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      @yield('content')
  </div>
