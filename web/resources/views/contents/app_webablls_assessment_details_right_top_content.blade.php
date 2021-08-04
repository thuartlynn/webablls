<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Assessment Details / '.$Ass_Detail->get("Name").' ('.$Ass_Detail->get("ID").')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This screen allows you to view the Assessment Details - the assigned date, grade level, color selection.</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Assessment Details / '.$Ass_Detail->get("Name").' ('.$Ass_Detail->get("ID").')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This screen allows you to view the Assessment Details - the assigned date, grade level, color selection.</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>