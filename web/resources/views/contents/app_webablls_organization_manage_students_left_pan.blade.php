@include('contents.app_webablls_organization_list')

@include('contents.app_webablls_organization_manage_list')

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
      <li class="nav-item app-left-pan-point flag" data-path="/Organization/Users">Back</li>
      <li id="Select_Replacement" class="nav-item app-left-pan-point" data-path="">Select Replacement</li>
    </ul>
  </nav>
</div>

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Filters</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Filters</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <div class="navbar-nav app-left-pan-list-mr-pd">
      <p class="app-left-pan-first-p">Name or ID#:</p>
      <input autocomplete="off" class="form-control app-left-pan-input app-option-font" id="Name" name="Name" type="text" value=""/>
      <div>
        <button id="filter" class="btn btn-sm btn-secondary" style="margin-top: 15px; margin-right: 5px;" type="button">Filter</button>
        <button id="clear" class="btn btn-sm btn-secondary" style="margin-top: 15px;" type="button">Clear Filters</button>
      </div>
      <input autocomplete="off" class="search hide" id="Name_hide" name="Name_hide" type="search" value="" data-column="0-1"/>
    </div>
  </nav>
</div>