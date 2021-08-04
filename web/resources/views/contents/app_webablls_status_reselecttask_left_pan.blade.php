@include('contents.app_webablls_student_list')

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item" onclick="TriggerSubmit()"><a>Save Changes</a></li>
      <li class="nav-item" onclick="window.location.reload();">Cancel Changes</li>
    </ul>
  </nav>
</div>

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Limit</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="limit" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item">Limit:<span id="taskLimit">50</span></li>
      <li class="nav-item">Select:<span id="taskSelected">0</span></li>
    </ul>
  </nav>
</div>