<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Add Assessment / '.$NewAssInfo["Name"].' ('.$NewAssInfo["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays a summary menu with links to all available actions related to the corresponding Student Profile along with assessments, reports, analytics, share permissions, and user account assignments. 
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Add Assessment / '.$NewAssInfo["Name"].' ('.$NewAssInfo["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays a summary menu with links to all available actions related to the corresponding Student Profile along with assessments, reports, analytics, share permissions, and user account assignments. 
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>
