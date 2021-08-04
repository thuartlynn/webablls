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
      <li id="save_change" class="nav-item app-left-pan-point" data-index="Save">Save Changes</li>
      <li id="save_change_next" class="nav-item app-left-pan-point" data-index="SaveAndNext">Save and Countinue to Next Category</li>
      <li id="cancel_change" class="nav-item app-left-pan-point" data-index="Cancel">Cancel Changes</li>
      <li id="grid_mode" class="nav-item app-left-pan-point" data-index="/Assessment/TgvGridEdit/{{$AssInfo->get('AssID')}}">Grid Mode</li>
      <li id="cat_mode" class="nav-item app-left-pan-point" data-index="/Assessment/TgvCatEdit/{{$AssInfo->get('AssID')}}/?filter=A">Cat Mode</li>
      <li id="assessment_details" class="nav-item app-left-pan-point" data-index="/Assessment/Details/{{$AssInfo->get('AssID')}}">Assessment Details</li>
      <li class="nav-item app-left-pan-point" data-index="/Assessment/CompletedItems/{{$AssInfo->get('AssID')}}?from=text&page=1&filter=all">Completed Items</li>
      <li class="nav-item app-left-pan-point" data-index="/Assessment/IncompletedItems/{{$AssInfo->get('AssID')}}?from=text&page=2&filter=all">Incompleted Items</li>
    </ul>
  </nav>
</div>

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Category</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Category</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="category" class="navbar-nav app-left-pan-list-mr-pd">
      <li id="A" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=A">A) Cooperation and Reinforcer Effectiveness</li>
      <li id="B" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=B">B) Visual Performance</li>
      <li id="C" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=C">C) Receptive Language</li>
      <li id="D" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=D">D) Motor Imitation</li>
      <li id="E" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=E">E) Vocal Imitation</li>
      <li id="F" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=F">F) Requests</li>
      <li id="G" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=G">G) Labeling</li>
      <li id="H" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=H">H) Intraverbals</li>
      <li id="I" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=I">I) Spontaneous Vocalizations</li>
      <li id="J" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=J">J) Syntax and Grammar</li>
      <li id="K" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=K">K) Play and Leisure Skills</li>
      <li id="L" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=L">L) Social Interactions</li>
      <li id="M" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=M">M) Group Instruction</li>
      <li id="N" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=N">N) Follow Classroom Routines</li>
      <li id="P" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=P">P) Generalized Responding</li>
      <li id="Q" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=Q">Q) Reading Skills</li>
      <li id="R" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=R">R) Math Skills</li>
      <li id="S" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=S">S) Writing Skills</li>
      <li id="T" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=T">T) Spelling</li>
      <li id="U" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=U">U) Dressing Skills</li>
      <li id="V" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=V">V) Eating Skills</li>
      <li id="W" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=W">W) Grooming Skills</li>
      <li id="X" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=X">X) Toileting Skills</li>
      <li id="Y" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=Y">Y) Gross Motor Skills</li>
      <li id="Z" class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=Z">Z) Fine Motor Skills</li>
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
        for ($i = 0; $i < sizeof($Ass_List);$i++) {
          if ($Ass_List[$i]["ID"] == $AssInfo->get('AssID')) {
            echo '<li style="color: gray;" class="nav-item app-left-pan-point app-disable" data-path="/Assessment/TgvTextEdit/'.$Ass_List[$i]["ID"].'/?filter=A"><label class="app-left-pan-point" style="display: inline;"><span style="margin-top: -2px; vertical-align: middle; width: 10px; height: 10px; border: 1px solid gray; display: inline-block; background-color:'.$Ass_List[$i]["Color"].';"></span> <span style="vertical-align: middle;"> <span style="color: gray;">'.$Ass_List[$i]["Date"].'</span> <br>'.$Ass_List[$i]["Name"].'</span></label></li>';
          } else {
            echo '<li class="nav-item app-left-pan-point" data-path="/Assessment/TgvTextEdit/'.$Ass_List[$i]["ID"].'/?filter=A"><label class="app-left-pan-point" style="display: inline;"><span style="margin-top: -2px; vertical-align: middle; width: 10px; height: 10px; border: 1px solid gray; display: inline-block; background-color:'.$Ass_List[$i]["Color"].';"></span> <span style="vertical-align: middle;"> <span style="text-decoration: underline; color: #337ab7;">'.$Ass_List[$i]["Date"].'</span> <br>'.$Ass_List[$i]["Name"].'</span></label></li>';
          }
        }
      ?>
    </ul>
  </nav>
</div>