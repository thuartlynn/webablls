@include('contents.app_webablls_organization_list')

@include('contents.app_webablls_organization_student_roster_list')

<?php
  if (sizeof($History) > 0) {
    if (Auth::user()->layout_format == 0) {
      echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
      echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>History</span>';
    } else {
      echo '<div class="app-left-pan" style="margin-top: 5px;">';
      echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>History</span>';
    }

    echo '<nav class="navbar app-left-pan-bg app-nopadding-nomargin">';
    echo '<ul id="History" class="navbar-nav app-left-pan-list-mr-pd">';
    foreach($History as $value) {
      echo '<li class="nav-item app-left-pan-point" data-path="/Organization/Students/ViewHistory/'.$Student["ID"].'?filter='.$value->get('Tag').'">'.$value->get('Text').'</li>';
    }
    echo '</ul>';
    echo '</nav>';
    echo '</div>';
  }
?> 