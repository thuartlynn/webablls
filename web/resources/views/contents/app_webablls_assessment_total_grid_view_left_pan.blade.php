@include('contents.app_webablls_anaytics_left_pan_list')

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
      <!--li class="nav-item app-left-pan-point" data-index="ProgramWorksheet">Generate Program Worksheet</li>
      <li class="nav-item app-left-pan-point" data-index="StatusReport">Generate Status Report</li>
      <li class="nav-item app-left-pan-point" data-index="BaselineReport">Generate Baseline Report</li-->
      <li class="nav-item app-left-pan-point" data-index="/Assessment/CompletedItems/{{$AssInfo->get('ID')}}?from=total&page=1&filter=all">Completed Items</li>
      <li class="nav-item app-left-pan-point" data-index="/Assessment/IncompletedItems/{{$AssInfo->get('ID')}}?from=total&page=2&filter=all">Incompleted Items</li>
      <li class="nav-item app-left-pan-point" data-index="PrintPDF">Print to PDF</li>
      <!--li class="nav-item app-left-pan-point" data-index="PrintPDFAgeMonths">Print to PDF with Age (Months)</li>
      <li class="nav-item app-left-pan-point" data-index="PrintPDFAgeYears">Print to PDF with Age (Years)</li-->
    </ul>
  </nav>
</div>

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Limit</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Limit</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="limit" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item">Limit:<span id="taskLimit">50</span></li>
      <li class="nav-item">Select:<span id="taskSelected">0</span></li>
      <li class="nav-item app-left-pan-point" id="Clear">Clear selected items</li>
    </ul>
  </nav>
</div>

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Student Assessments</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student Assessments</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="StudentAssessments" class="navbar-nav app-left-pan-list-mr-pd">
      <?php
        for ($i = 0; $i < sizeof($Ass_List); $i++) {
          echo '<li class="nav-item"><label style="display: inline;"><span style="margin-top: -2px; vertical-align: middle; width: 10px; height: 10px; border: 1px solid gray; display: inline-block; background-color:'.$Ass_List[$i]["Color"].';"></span> <span style="vertical-align: middle;"> <span style="text-decoration: underline; color: #337ab7;">'.$Ass_List[$i]["Date"].'</span> <br>'.$Ass_List[$i]["Name"].'</span></label></li>';
        }
      ?>
    </ul>
  </nav>
</div>