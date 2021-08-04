@include('contents.app_webablls_student_list')

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item" onclick="TriggerSubmit()"><a>Save</a></li>
      <li class="nav-item" onclick="window.location.reload();">Cancel</li>
      <li class="nav-item" >Generate next Progress Report</li>
      <li class="nav-item" >Generate PDF with Notes</li>
      <li class="nav-item" >Generate PDF without Notes</li>
      <li class="nav-item" >Generate CSV</li>
    </ul>
  </nav>
</div>
