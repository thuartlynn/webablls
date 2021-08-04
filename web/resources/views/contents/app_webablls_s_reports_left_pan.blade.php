@include('contents.app_webablls_student_list')

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd disable">
      <li class="nav-item app-left-pan-point" data-path="/Report/edit/">Edit Report</li>
      <!-- <li class="nav-item">Download PDF</li> -->
      <li class="nav-item app-left-pan-point" onclick="removeReport()">Remove Report</li>
      <!-- <li class="nav-item">Download CSV</li> -->
    </ul>
  </nav>
</div>

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Report Type Filter</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="reportFilter" class="navbar-nav app-left-pan-list-mr-pd">
      <li><input class="mr-1" type="checkbox" id="programWork" />Program Worksheet</li>
      <li><input class="mr-1" type="checkbox" id="progress" />Progress</li>
      <li><input class="mr-1" type="checkbox" id="sTatus" />Status</li>
      <li><input class="mr-1" type="checkbox" id="bAseline" />Baseline</li>

      <input class="search hide" id="P_hide" type="search" value="" data-column="1"/>
    </ul>
  </nav>
</div>