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

  <nav class="navbar ml-1 mt-n1">
    <ul class="navbar-nav" id="actions">
      <li class="nav-item ">
        <label for="fileinput" class="app-left-pan-point" style="margin-bottom:2px;">Upload
          <input type="file" id="fileinput" accept="*" style="display:none;" />
        </label>    
      </li>
    </ul>
  </nav>

  <nav class="navbar mt-n3 ml-1" >
    <ul class="navbar-nav disable" id="actions2">
      <li class="nav-item app-left-pan-point" id="download" data-path="downloadFile">Download File</li>
      <li id="RemoveFile" class="nav-item app-left-pan-point" data-path="removeFile">Remove File</li>
      <li id="SetDescripte" class="nav-item app-left-pan-point" data-path="setDescription">Set Description</li>
    </ul>
  </nav>
</div>
