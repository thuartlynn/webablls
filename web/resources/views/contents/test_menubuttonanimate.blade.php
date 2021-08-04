<div id="preloader" class="preloader">
	<div class="loader-status">
			<div class="spinner"><p>Teco Image</p></div>
  </div>
</div>

<nav class=" navbar navbar-expand-md navbar-dark header-bg">
    <div class="container">
      <a href="/" ><img id="logo" src="{{ URL::asset('images/webablls_logo_new.png') }}"></a>
      <button class="navbar-toggler test" id="test" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>
      <nav class="collapse navbar-collapse mt-n4" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mr-3" id="test-1">
            <a class="nav-link mr-3 header-link" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt fa-lg mr-2 for_i_tag"></i>LOG IN</a>
          </li>
          <li class="nav-item mr-3" id="test-2">
            <a class="nav-link header-link" href="{{ url('/purchase') }}"><i class="fas fa-shopping-bag fa-lg mr-2 for_i_tag"></i>PURCHASE</a>
          </li>
          <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle header-link mr-3" id="navbardrop" data-toggle="dropdown"><i class="fas fa-globe fa-lg mr-2 for_i_tag"></i>LANGUAGE</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/">ENGLISH</a>
                    <a class="dropdown-item" href="#">Español</a>
                </div>
          </li> -->
          </ul>
        </nav>
      </div>
</nav>