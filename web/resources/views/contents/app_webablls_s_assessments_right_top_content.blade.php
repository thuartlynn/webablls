<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student Assessment / '.$Student["Name"].' ('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays all assessments for the particular student selected. Use the Assessment Filters for quick access to a particular assessment, or group of assessments. Simply enter search parameters and the results will display immediately. The Assessment List display can be sorted by any column by clicking the column title. To select a secondary sort order, hole the shift key while selecting the second column. To activate the Actions panel functions, highlight the corresponding assessment and select the desired action. To generate a report to correspond with the assessment, select the Total Grid View link to proceed.
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student Assessment / '.$Student["Name"].' ('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays all assessments for the particular student selected. Use the Assessment Filters for quick access to a particular assessment, or group of assessments. Simply enter search parameters and the results will display immediately. The Assessment List display can be sorted by any column by clicking the column title. To select a secondary sort order, hole the shift key while selecting the second column. To activate the Actions panel functions, highlight the corresponding assessment and select the desired action. To generate a report to correspond with the assessment, select the Total Grid View link to proceed.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>
