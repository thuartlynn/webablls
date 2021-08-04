<?php
  use App\Enums\UserRole;
?>

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
      <!-- <li class="nav-item" id="hideReport"><a>Hide Reports</a></li>
      <li class="nav-item text-secondary" id="showReport"><a>Show Reports</a></li> -->
      
      <li class="nav-item" id="showRecent"><a>Show only most recent Assessment</a></li>
      <li class="nav-item text-secondary" id="showAll"><a>Show all Assessments</a></li>
    </ul>
  </nav>
</div>

<?php
  if (Auth::user()->role == 2 || (Auth::user()->role == 1 && $Student['Permission']->contains('CO')) || (Auth::user()->role == 1 && $Student['Permission']->contains('O'))) {
    if (Auth::user()->layout_format == 0) {
      echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
      echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Student Management</span>';
    } else {
      echo '<div class="app-left-pan" style="margin-top: 5px;">';
      echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student Management</span>';
    }
    echo '
            <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
              <ul id="actions2" class="navbar-nav app-left-pan-list-mr-pd">
                <li class="nav-item app-left-pan-point" onclick="link2ArchiveS()">Archive Student</li>
              </ul>
            </nav>
          </div>';
  } else {
      if (Auth::user()->layout_format == 0) {
        echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
        echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Student Management</span>';
      } else {
        echo '<div class="app-left-pan" style="margin-top: 5px;">';
        echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student Management</span>';
      }
      echo '<nav class="navbar app-left-pan-bg app-nopadding-nomargin">
              <ul id="actions2" class="navbar-nav app-left-pan-list-mr-pd">
                <li class="nav-item app-left-pan-point app-disable">Archive Student</li>
              </ul>
            </nav>
          </div>';
  }
?>