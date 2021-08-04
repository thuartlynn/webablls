<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Baseline Report / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              A Baseline Report is a static report that includes all assessment tasks and the corresponding scores - this report is similar to the Status Report; however, it includes all tasks within WebABLLS.
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Baseline Report / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              A Baseline Report is a static report that includes all assessment tasks and the corresponding scores - this report is similar to the Status Report; however, it includes all tasks within WebABLLS.
            <div class="button">Hide help</div>
          </div>';
  }
?>

