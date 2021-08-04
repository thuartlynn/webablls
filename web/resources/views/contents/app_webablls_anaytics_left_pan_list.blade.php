<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Student</span>';
  } else {
    echo '<div class="app-left-pan">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="student" class="navbar-nav app-left-pan-list-mr-pd">
      <li id="list_summary" class="nav-item app-left-pan-point" data-path="/Student/ViewSummary/">Summary</li>
      <li id="list_profile" class="nav-item app-left-pan-point" data-path="/Student/ViewProfile/">Profile</li>
      <li id="list_tgv" class="nav-item app-left-pan-point" data-path="/Assessment/TgvGrid/">Total Grid View</li>
      <li id="list_assessments" class="nav-item app-left-pan-point" data-path="/Student/Assessments/">Assessments</li>
      <!--li id="list_reports" class="nav-item app-left-pan-point" data-path="/Student/ViewReports/">Reports</li-->
      <li id="list_share" class="nav-item app-left-pan-point" data-path="/Student/ShareStudent/">Share</li>
      <li id="list_history" class="nav-item app-left-pan-point" data-path="/Student/History/">History</li>
      <li id="list_files" class="nav-item app-left-pan-point" data-path="/Student/Files/">Files</li>
      <li id="list_notes" class="nav-item app-left-pan-point" data-path="/Student/Notes/">Notes</li>
      <!--li id="list_add_analysis" class="nav-item app-left-pan-point" data-path="/Student/AddAnalysis/">Add Analysis</li-->
      <!--li id="list_analytics_list" class="nav-item app-left-pan-point" data-path="/Student/AnalyticsList/">Analytics List</li-->
      <li id="list_add_assessment" class="nav-item app-left-pan-point" data-path="/Student/AddAssess/">Add Assessment</li>
    </ul>
  </nav>
</div>