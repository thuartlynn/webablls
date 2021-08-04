<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Reports / Student Name (Student"ID")</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays all reports for the particular student selected. Use the Report Filters for quick access to a particular Report, or group of Reports, by type or date. Simply enter search parameters and the results will display immediatly. The Report display can be sorted by any column by clicking the column title. To select a secondary sort order, hold the shift key while selecting the second column. To activate the Actions panel functions, highlight the corresponding report within the table and select the desired action.
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Reports / Student Name (Student"ID")</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays all reports for the particular student selected. Use the Report Filters for quick access to a particular Report, or group of Reports, by type or date. Simply enter search parameters and the results will display immediatly. The Report display can be sorted by any column by clicking the column title. To select a secondary sort order, hold the shift key while selecting the second column. To activate the Actions panel functions, highlight the corresponding report within the table and select the desired action.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>