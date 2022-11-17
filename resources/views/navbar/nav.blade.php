<header id="header" class="header d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="#" class="logo d-flex align-items-center">    
  </a>
  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
  <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
  <nav id="navbar" class="navbar">
    <ul class="navbar-nav ms-auto">
      @auth
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li class="dropdown-item">Welcome Back, {{ auth()->user()->name }}</li>
          <li><hr class="dropdown-divider"></li> 
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="dropdown-item"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout
              </button>
            </form>
          </li>
          
        </ul>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      @endauth
    </ul>
</ul>
</li>
</ul>
</nav><!-- .navbar -->

</div>
</header>