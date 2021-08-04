<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Analysis / .$Student["Name"]. (.$Student["ID"].)</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              ShortHelp not set for Analysis_View
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Analysis / .$Student["Name"]. (.$Student["ID"].)</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              ShortHelp not set for Analysis_View
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>
