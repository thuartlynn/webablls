<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">'.$Title.' / '.$AssInfo->get('Name').' ('.$AssInfo->get('ID').')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>The Completed and Incomplete Items Reports are documents that display opposite data - Complete or Incomplete tasks within the WebABLLS assessment. Either report can be generated to include ALL categories or a specific CURRENT category, which can be selected from the Actions panel.</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">'.$Title.' / '.$AssInfo->get('Name').' ('.$AssInfo->get('ID').')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>The Completed and Incomplete Items Reports are documents that display opposite data - Complete or Incomplete tasks within the WebABLLS assessment. Either report can be generated to include ALL categories or a specific CURRENT category, which can be selected from the Actions panel.</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>