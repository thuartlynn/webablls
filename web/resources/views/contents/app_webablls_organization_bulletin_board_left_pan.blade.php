@include('contents.app_webablls_organization_list')

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
      <li id="new" class="nav-item app-left-pan-point">Add new bulletin</li>
      <li id="edit" class="app-disable nav-item app-left-pan-point">Modify select bulletin</li>
      <li id="remove" class="app-disable nav-item app-left-pan-point">Delete select bulletin</li>
    </ul>
  </nav>
</div>