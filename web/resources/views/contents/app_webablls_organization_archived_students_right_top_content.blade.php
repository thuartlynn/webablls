<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Archived Students</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              The Archive Students link is available only to Organization Administrators. Student profiles can be moved from the Student List on the Organization screen to the Archived Students portal by highlighting the student\'s row from the list and clicking the Archived Students link from the Organization panel. Once a student profile is archived, the seat that was vacated will become available for use for another student, provided an open seat is available. Note: Any authorized sharing rights must been removed prior to the system accepting the archive request. To retrieve a student profile from archive, highlight the row and click "Un-archive Student"
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Archived Students</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              The Archive Students link is available only to Organization Administrators. Student profiles can be moved from the Student List on the Organization screen to the Archived Students portal by highlighting the student\'s row from the list and clicking the Archived Students link from the Organization panel. Once a student profile is archived, the seat that was vacated will become available for use for another student, provided an open seat is available. Note: Any authorized sharing rights must been removed prior to the system accepting the archive request. To retrieve a student profile from archive, highlight the row and click "Un-archive Student"
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>