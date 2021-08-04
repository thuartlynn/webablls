<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Organization</span>';
  } else {
    echo '<div class="app-left-pan">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Organization</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="list" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item app-left-pan-point" data-path="/Organization/View">Organization Details</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Settings">Timeout Setting</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Users">Organization User List</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/AddUser">Add User</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/StudentParameter">Student Parameters</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/ArchivedStudents">Archived Students</li>
      <li class="nav-item app-left-pan-point" data-path="/Organization/Students">Student Roster</li>
      <!--li class="nav-item app-left-pan-point" data-path="/Organization/OpenOrder">Open Order</li-->
      <li class="nav-item app-left-pan-point" data-path="/Organization/Addresses">Addresses</li>
      <!--li class="nav-item app-left-pan-point" data-path="/Organization/Orders">Orders</li-->
      <li class="nav-item app-left-pan-point" data-path="/Organization/BulletinBoard">Bulletin Board</li>
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