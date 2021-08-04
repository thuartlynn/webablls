<?php
  use App\Enums\UserRole;
?>

<div>
  <nav class="navbar navbar-expand-xl navbar-dark app-header-bg navbar-main app-nopadding-nomargin">
    <div class="container-fluid">
      <a href="{{url('/')}}" ><img class="app-nopadding-nomargin" id="app-logo" src="{{ URL::asset('images/logo_small.png') }}"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#app-navbarResponsive" aria-controls="app-navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="app-navbarResponsive">
        <ul class="nav navbar-nav mr-auto app-header">
          <li class="nav-item">
            <a class="nav-link app-text-500-15" href="{{url('/Dashboard')}}">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link app-text-500-15" href="{{url('/Student/List')}}">Student</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link app-text-500-15" href="{{url('/Contact')}}">Contacts</a>
          </li> -->
          <?php
            if (strval(Auth::user()->role) != UserRole::Restricted()) {
              echo '<li class="nav-item">';
              echo '<a class="nav-link app-text-500-15" href="/Assessment">Assessments</a>';
              echo '</li>';
            }
          ?>
          <!-- <li class="nav-item">
            <a class="nav-link app-text-500-15" href="{{url('/ReportList')}}">Reports</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link app-text-500-15" href="{{url('/analysis list')}}">Analytics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link app-text-500-15" href="{{url('/Account')}}">Account</a>
          </li>
          <?php
            if (strval(Auth::user()->role) != UserRole::Restricted() && strval(Auth::user()->role) != UserRole::Standard()) {
              echo '<li class="nav-item">';
              echo '<a class="nav-link app-text-500-15" href="/Organization/View">Organization</a>';
              echo '</li>';
            }
          ?>
          <!-- <li class="nav-item">
            <a class="nav-link app-text-700-15" target="_blank" href="http://support.webablls.net" rel="noreferrer noopener">Support Center</a>
          </li> -->
        </ul>
        <ul class="nav navbar-nav ml-auto app-header">
          <!-- <li class="app-lang">
            <select class="app-selectlang custom-select">
              <option value="0">Select Language</option>
              <option value="1">English</option>
              <option value="2">Spanish</option>
            </select>
          </li> -->
          <li class="nav-item">
            <a class="nav-link app-text-700-12" href="{{url('/Account')}}"><i class="fas fa-user fa-lg mr-1"></i><?php echo Auth::user()->email?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link app-text-700-12" href="{{url('/logout')}}">Log off</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
