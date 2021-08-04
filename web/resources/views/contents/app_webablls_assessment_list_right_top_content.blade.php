<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Assessment List</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              This screen displays all assessments associated with your user account with permissions to view or modify. Each row represents one assessment, so there can be multiple assessments for any given student, which is why a student name may appear more than once in the table.
              <!--a href="#" target="_blank">Learn more</a-->  
            </p>
           <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Assessment List</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              This screen displays all assessments associated with your user account with permissions to view or modify. Each row represents one assessment, so there can be multiple assessments for any given student, which is why a student name may appear more than once in the table.
              <!--a href="#" target="_blank">Learn more</a!-->  
            </p>
           <div class="button">Hide help</div>
          </div>';
  }
?>