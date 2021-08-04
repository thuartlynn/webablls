<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Student</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="Student" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item app-left-pan-point" data-path="/Organization/Students">Back to Student Roster</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Students/EditProfile/<?php echo $Student->get("ID")?>">Edit Profile</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Students/ViewHistory/<?php echo $Student->get("ID")?>">View History</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Students/UserLinks/<?php echo $Student->get("ID")?>">Share Permissions by Student</li>
    </ul>
  </nav>
</div>