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
      <?php
          if ($CompleteItems->count() == 0) {
            echo '<li class="nav-item app-left-pan-point app-disable" data-index="all">Download PDF with ALL Items</li>';
          } else {
            echo '<li class="nav-item app-left-pan-point" data-index="all">Download PDF with ALL Items</li>';
          }
          if ($Filter == "all") {
            echo '<li class="app-disable nav-item app-left-pan-point" data-index="'.$Filter.'">Download PDF with CURRENT Category</li>';
          } else {
            echo '<li class="nav-item app-left-pan-point" data-index="'.$Filter.'">Download PDF with CURRENT Category</li>';
            echo '<li id="prev3" class="prev nav-item app-left-pan-point" data-index="Pre">Previous Category</li>';
            echo '<li id="next3" class="next nav-item app-left-pan-point" data-index="Next">Next Category</li>';
          }
      ?>
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
      <?php
          if ($Page == 1) {
            echo '<li id="all" class="nav-item app-left-pan-point" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=all">All categories</li>
                  <li id="A" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=A">A) Cooperation and Reinforcer Effectiveness</li>
                  <li id="B" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=B">B) Visual Performance</li>
                  <li id="C" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=C">C) Receptive Language</li>
                  <li id="D" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=D">D) Motor Imitation</li>
                  <li id="E" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=E">E) Vocal Imitation</li>
                  <li id="F" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=F">F) Requests</li>
                  <li id="G" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=G">G) Labeling</li>
                  <li id="H" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=H">H) Intraverbals</li>
                  <li id="I" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=I">I) Spontaneous Vocalizations</li>
                  <li id="J" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=J">J) Syntax and Grammar</li>
                  <li id="K" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=K">K) Play and Leisure Skills</li>
                  <li id="L" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=L">L) Social Interactions</li>
                  <li id="M" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=M">M) Group Instruction</li>
                  <li id="N" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=N">N) Follow Classroom Routines</li>
                  <li id="P" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=P">P) Generalized Responding</li>
                  <li id="Q" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=Q">Q) Reading Skills</li>
                  <li id="R" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=R">R) Math Skills</li>
                  <li id="S" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=S">S) Writing Skills</li>
                  <li id="T" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=T">T) Spelling</li>
                  <li id="U" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=U">U) Dressing Skills</li>
                  <li id="V" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=V">V) Eating Skills</li>
                  <li id="W" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=W">W) Grooming Skills</li>
                  <li id="X" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=X">X) Toileting Skills</li>
                  <li id="Y" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=Y">Y) Gross Motor Skills</li>
                  <li id="Z" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/CompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=Z">Z) Fine Motor Skills</li>';
          } else {
            echo '<li id="all" class="nav-item app-left-pan-point" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=all">All categories</li>
                  <li id="A" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=A">A) Cooperation and Reinforcer Effectiveness</li>
                  <li id="B" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=B">B) Visual Performance</li>
                  <li id="C" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=C">C) Receptive Language</li>
                  <li id="D" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=D">D) Motor Imitation</li>
                  <li id="E" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=E">E) Vocal Imitation</li>
                  <li id="F" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=F">F) Requests</li>
                  <li id="G" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=G">G) Labeling</li>
                  <li id="H" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=H">H) Intraverbals</li>
                  <li id="I" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=I">I) Spontaneous Vocalizations</li>
                  <li id="J" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=J">J) Syntax and Grammar</li>
                  <li id="K" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=K">K) Play and Leisure Skills</li>
                  <li id="L" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=L">L) Social Interactions</li>
                  <li id="M" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=M">M) Group Instruction</li>
                  <li id="N" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=N">N) Follow Classroom Routines</li>
                  <li id="P" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=P">P) Generalized Responding</li>
                  <li id="Q" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=Q">Q) Reading Skills</li>
                  <li id="R" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=R">R) Math Skills</li>
                  <li id="S" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=S">S) Writing Skills</li>
                  <li id="T" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=T">T) Spelling</li>
                  <li id="U" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=U">U) Dressing Skills</li>
                  <li id="V" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=V">V) Eating Skills</li>
                  <li id="W" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=W">W) Grooming Skills</li>
                  <li id="X" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=X">X) Toileting Skills</li>
                  <li id="Y" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=Y">Y) Gross Motor Skills</li>
                  <li id="Z" class="pl-2 nav-item app-left-pan-point app-disappear" data-path="/Assessment/IncompletedItems/'.$ID.'/?from='.$From.'&page='.$Page.'&filter=Z">Z) Fine Motor Skills</li>';
          }
      ?>
    </ul>
  </nav>
</div>