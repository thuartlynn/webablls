@include('contents.app_webablls_student_list')

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>History</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>History</span>';
  }
?>

  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="History" class="navbar-nav app-left-pan-list-mr-pd">
      <?php
        echo '<li class="nav-item app-left-pan-point" data-path="/Student/History/'.$Student["ID"].'">All</li>';

        foreach($History as $value) {
          echo '<li class="nav-item app-left-pan-point" data-path="/Student/History/'.$Student["ID"].'?filter='.$value["Tag"].'">'.$value["Text"].'</li>';

        }
      ?>
    </ul>
  </nav>
</div>