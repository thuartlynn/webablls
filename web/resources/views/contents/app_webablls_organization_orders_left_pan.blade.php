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
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd disable">
      <li class="nav-item app-left-pan-point">View Details</li>
      <li class="nav-item app-left-pan-point">Download Invoice</li>
      <li class="nav-item app-left-pan-point">Download Summary</li>
      <li class="nav-item app-left-pan-point">Pay with Credit Card</li>
    </ul>
  </nav>
</div>