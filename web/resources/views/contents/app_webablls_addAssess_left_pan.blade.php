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
      <!-- <li class="nav-item app-left-pan-point" id="testsubmit">Continue</li> NO Work -->
      <!-- <label class="nav-item app-left-pan-point" for="addAssess_submit">Continue</label> 頁面會跳轉到最下面的submit按鈕-->
      <!-- <input type="submit" class="btn btn-sm font-weight-normal ml-n2" form="addAssess" value="Continue" /> -->
      <li class="nav-item app-left-pan-point" data-index="Continue">Continue</li>
    </ul>
  </nav>
</div>

<script>

  
</script>