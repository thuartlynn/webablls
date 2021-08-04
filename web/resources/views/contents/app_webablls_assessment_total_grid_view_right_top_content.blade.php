<?php
    $Faker_Student = array( 0=>array("Name"=> "William H",
                                     "ID"=>"11301"));

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Total Grid View / '.$AssInfo->get('Name').' ('.$AssInfo->get('ID').')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This Total Grid View allows you to view all assessments for a given student. Move forward or backward by clicking "Next Page" and "Previous Page". The options in the left-hand panel allow you to generate customized reports. To generate a basic report including all assessments choose "Generate Baseline Report". To generate a status report or an Program Worksheet, select the the assessment skills or tasks you wish to include by highlighting them, then click "Generate Status Report" or "Generate IEP Worksheet". To view completed or incomplete items only, click on "Completed Items" or "Incomplete Items" respectively.</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Total Grid View / '.$AssInfo->get('Name').' ('.$AssInfo->get('ID').')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This Total Grid View allows you to view all assessments for a given student. Move forward or backward by clicking "Next Page" and "Previous Page". The options in the left-hand panel allow you to generate customized reports. To generate a basic report including all assessments choose "Generate Baseline Report". To generate a status report or an Program Worksheet, select the the assessment skills or tasks you wish to include by highlighting them, then click "Generate Status Report" or "Generate IEP Worksheet". To view completed or incomplete items only, click on "Completed Items" or "Incomplete Items" respectively.</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>