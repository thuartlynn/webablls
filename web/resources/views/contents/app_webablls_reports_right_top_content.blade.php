<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">All Reports</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              This screen displays all Reports associated with your user account with permissions to view or modify (marked as V or M). Each row represents one report, so there can be multipie reports for any given student, which is why student name may appear more than once in the table.    
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">All Reports</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays all Reports associated with your user account with permissions to view or modify (marked as V or M). Each row represents one report, so there can be multipie reports for any given student, which is why student name may appear more than once in the table.    
            <!--a href="#">Learn more</a-->
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>