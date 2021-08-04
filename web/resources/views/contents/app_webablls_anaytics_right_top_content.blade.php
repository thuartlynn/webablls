<?php

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Analytics List</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This screen displays all analyses associated with your user account with permissions to view or modify. Each row represents one analysis, so there can be multiple analyses for any given student, which is why a student name may appear more than once in the list.</p>
              <p>There are several ways users can use the list...</p>
              <ul>
                <li class="app-nopadding-nomargin">Default display is sorted by assessment date</li>
                <li class="app-nopadding-nomargin">User can use the filters to locate a specific analysis by student or creator</li>
                <li class="app-nopadding-nomargin">Sort by any of the list\'s column headers to select the desired action</li>
                <li class="app-nopadding-nomargin">Click the <b>Analysis ID</b> number to go directly to the corresponding Analysis screen</li>
                <li class="app-nopadding-nomargin">To activate the links in the action panel <b>(View, Change Details, or Remove)</b> click the corresponding row to highlight</li>
              </ul>
              <p><b>Note:</b> Depending on the user\'s level of share permissions some of the links may not be active.</p>
              <p>Go to <b>Student Summary</b> screen to create a <b>NEW</b> Analysis - click student\'s name from the list below to access the <b>Add Analysis</b> link</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Analytics List</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This screen displays all analyses associated with your user account with permissions to view or modify. Each row represents one analysis, so there can be multiple analyses for any given student, which is why a student name may appear more than once in the list.</p>
              <p>There are several ways users can use the list...</p>
              <ul>
                <li class="app-nopadding-nomargin">Default display is sorted by assessment date</li>
                <li class="app-nopadding-nomargin">User can use the filters to locate a specific analysis by student or creator</li>
                <li class="app-nopadding-nomargin">Sort by any of the list\'s column headers to select the desired action</li>
                <li class="app-nopadding-nomargin">Click the <b>Analysis ID</b> number to go directly to the corresponding Analysis screen</li>
                <li class="app-nopadding-nomargin">To activate the links in the action panel <b>(View, Change Details, or Remove)</b> click the corresponding row to highlight</li>
              </ul>
              <p><b>Note:</b> Depending on the user\'s level of share permissions some of the links may not be active.</p>
              <p>Go to <b>Student Summary</b> screen to create a <b>NEW</b> Analysis - click student\'s name from the list below to access the <b>Add Analysis</b> link</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>