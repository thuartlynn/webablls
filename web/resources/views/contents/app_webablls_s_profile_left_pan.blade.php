@include('contents.app_webablls_student_list')

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Actions</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>';
  }
?>

  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <!-- <button class="btn btn-sm text-left app-left-pan pl-0" type="submit" form="settingsfrm">Save Changes</button>
      <button class="btn btn-sm text-left app-left-pan pl-0" onclick="window.location.reload();">Cancel Changes</button> -->

      <li class="nav-item app-left-pan-point" onclick="TriggerSubmit()">Save Changes</li>
      <li class="nav-item app-left-pan-point" onclick="window.location.reload();">Cancel Changes</li>
    </ul>
  </nav>
</div>