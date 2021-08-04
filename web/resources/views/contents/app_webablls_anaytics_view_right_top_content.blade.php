<?php
  $Name = 'William H';
  $ID = '11301';

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Analytics / '.$Name.' ('.$ID.')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This screen displays all components selected when creating the analysis.</p>
              <p><b>VIEW ANAYSIS COMPONENTS:</b> Use the links within the Analysis Components section below. Click component title to view the corresponding table and/or graphs</p>
              <p><b>CHANGE DETAILS:</b> To revise the analysis details, click the <b>Change Analysis Details</b> link from the action panel or by using the button at the bottom of the screen. This redirects to the <b>Change Analysis Details</b> screen to change the details of an existing analysis. Users can toggle back and forth to insure the analysis details and options selected are displayed to meet the user\'s needs.</p>
              <p><b>NARRATIVE REPORT:</b> Click the <b>Download DOCX Report</b> to create a narrative report related to the analysis data selected. The Narrative Report will download as a desktop file or review, edit, and distribution. Additionally, users can print each analysis component independently using the Print option directly from the browser window.</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Analytics / '.$Name.' ('.$ID.')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This screen displays all components selected when creating the analysis.</p>
              <p><b>VIEW ANAYSIS COMPONENTS:</b> Use the links within the Analysis Components section below. Click component title to view the corresponding table and/or graphs</p>
              <p><b>CHANGE DETAILS:</b> To revise the analysis details, click the <b>Change Analysis Details</b> link from the action panel or by using the button at the bottom of the screen. This redirects to the <b>Change Analysis Details</b> screen to change the details of an existing analysis. Users can toggle back and forth to insure the analysis details and options selected are displayed to meet the user\'s needs.</p>
              <p><b>NARRATIVE REPORT:</b> Click the <b>Download DOCX Report</b> to create a narrative report related to the analysis data selected. The Narrative Report will download as a desktop file or review, edit, and distribution. Additionally, users can print each analysis component independently using the Print option directly from the browser window.</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>