<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student Roster</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays a list of all student profiles associated with an organization (or customer account). The table displays information on each student (ID#, name, gender, date of birth, and the location parameter (when set by the Organization administrator). To select a student profile to perform an action, click the corresponding row to highlight then click the desired action from the Action panel (Edit Profile, View History, Share). The Organization Students display can be sorted by any column by clicking the column title. To select a secondary sort order, hold the shift key while selecting the second column. Use the filters for quick access to a particular student. Simply enter search parameters, click the Filter link, and the results will display immediately.
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student Roster</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays a list of all student profiles associated with an organization (or customer account). The table displays information on each student (ID#, name, gender, date of birth, and the location parameter (when set by the Organization administrator). To select a student profile to perform an action, click the corresponding row to highlight then click the desired action from the Action panel (Edit Profile, View History, Share). The Organization Students display can be sorted by any column by clicking the column title. To select a secondary sort order, hold the shift key while selecting the second column. Use the filters for quick access to a particular student. Simply enter search parameters, click the Filter link, and the results will display immediately.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>