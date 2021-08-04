<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Account</span>';
  } else {
    echo '<div class="app-left-pan">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Account</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="list" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item app-left-pan-point" data-path="/Account">View Details</li>
      <li class="nav-item app-left-pan-point" data-path="/Account/ChangeDetails">Change Details</li>
      <li class="nav-item app-left-pan-point" data-path="/Account/ChangeEmail">Change Email</li>
      <!--li class="nav-item app-left-pan-point" data-path="/Account/Language">Change Language</li-->
      <li class="nav-item app-left-pan-point" data-path="/Account/ChangePassword">Change Password</li>
    </ul>
  </nav>
</div>

<script type="text/javascript">

    $(function () {
        $("#list li").click(function(e) {
            location.href=$(this).data("path");
        });
    });
</script>