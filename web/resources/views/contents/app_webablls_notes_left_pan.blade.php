@include('contents.app_webablls_student_list')

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Type</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Type</span>';
  }
?>

  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <li class="nav-item app-left-pan-point app-disable" id="showAll">Show All</li>
      <li class="nav-item app-left-pan-point" id="showOpen">Show Only Open</li>
      <li class="nav-item app-left-pan-point" id="showPrivate">Show Only Private</li>
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
      <li id="notesall" class="nav-item app-left-pan-point app-disable" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=all">All Categries</li>
      <li id="A" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=A">A) Cooperation and Reinforcer Effectiveness</li><!--ID 記得還沒設變數-->
      <li id="B" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=B">B) Visual Performance</li>
      <li id="C" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=C">C) Receptive Language</li>
      <li id="D" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=D">D) Motor Imitation</li>
      <li id="E" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=E">E) Vocal Imitation</li>
      <li id="F" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=F">F) Requests</li>
      <li id="G" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=G">G) Labeling</li>
      <li id="H" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=H">H) Intraverbals</li>
      <li id="I" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=I">I) Spontaneous Vocalizations</li>
      <li id="J" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=J">J) Syntax and Grammar</li>
      <li id="K" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=K">K) Play and Leisure Skills</li>
      <li id="L" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=L">L) Social Interactions</li>
      <li id="M" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=M">M) Group Instruction</li>
      <li id="N" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=N">N) Follow Classroom Routines</li>
      <li id="P" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=P">P) Generalized Responding</li>
      <li id="Q" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=Q">Q) Reading Skills</li>
      <li id="R" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=R">R) Math Skills</li>
      <li id="S" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=S">S) Writing Skills</li>
      <li id="T" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=T">T) Spelling</li>
      <li id="U" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=U">U) Dressing Skills</li>
      <li id="V" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=V">V) Eating Skills</li>
      <li id="W" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=W">W) Grooming Skills</li>
      <li id="X" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=X">X) Toileting Skills</li>
      <li id="Y" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=Y">Y) Gross Motor Skills</li>
      <li id="Z" class="pl-2 nav-item app-left-pan-point" data-path="/Student/Notes/<?php echo ''.$Students["ID"].'' ?>?filter=Z">Z) Fine Motor Skills</li>
    </ul>
  </nav>
</div>
