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
      <li id="grid_mode" class="nav-item app-left-pan-point" data-path="/Assessment/TgvGridEdit/{{$Ass_Detail->get('AssID')}}">Grid Mode</li>
      <li id="text_mode" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$Ass_Detail->get('AssID')}}/?filter=A">Text Mode</li>
      <li id="cat_mode" class="nav-item app-left-pan-point" data-path="/Assessment/TgvCatEdit/{{$Ass_Detail->get('AssID')}}/?filter=A">Cat Mode</li>
      <li class="nav-item app-left-pan-point" data-path="/Assessment/CompletedItems/{{$Ass_Detail->get('AssID')}}/?from=details&page=1&filter=all">Completed Items</li>
      <li class="nav-item app-left-pan-point" data-path="/Assessment/IncompletedItems/{{$Ass_Detail->get('AssID')}}/?from=details&page=2&filter=all">Incomplete Items</li>
    </ul>
  </nav>
</div>