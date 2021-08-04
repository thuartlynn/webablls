<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Actions</span>';
  } else {
    echo '<div class="app-left-pan">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <li id="Assessment_Details" class="nav-item app-left-pan-point app-disable" data-path="/Assessment/Details/">Assessment Details</li>
      <li id="Grid_Edit" class="nav-item app-left-pan-point app-disable" data-path="/Assessment/TgvGridEdit/">Grid Edit</li>
      <li id="Text_Edit" class="nav-item app-left-pan-point app-disable" data-path="/Assessment/TgvTextEdit/">Text Edit</li>
      <li id="Cat_Edit" class="nav-item app-left-pan-point app-disable" data-path="/Assessment/TgvCatEdit/">Cat Edit</li>
      <!--li id="View_Report" class="nav-item app-left-pan-point app-disable" data-path="/Student/ViewReports/">View Reports</li-->
      <li id="TGV" class="nav-item app-left-pan-point app-disable" data-path="/Assessment/TgvGrid/">Total Grid View</li>
      <li id="Student_Summary" class="nav-item app-left-pan-point app-disable" data-path="/Student/ViewSummary/">Student Summary</li>
    </ul>
  </nav>
</div>