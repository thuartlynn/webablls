<?php
    $Faker_Student = array( 0=>array("Name"=> "William H",
                                     "ID"=>"11301"));

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Assessment - Grid Edit / '.$AssInfo->get('Name').' ('.$AssInfo->get('ID').')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This section allows you to view data scored for all assessments for a given student. Move forward or backwards by clicking the "Next Page" and :Previous Page" links. The options in the left-hand panel allow you to generate custom reports. To generate a basic report including all assessments, choose "Generate Baseline Report." To generate a Status Report or a Program Worksheet, select the tasks to include by highlighting the task(s), then click "Generate Status Report" or "Generate Program Worksheet." To view completed or incomplete items only, use the "Completed Items" or "Incomplete Items" links</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Assessment - Grid Edit / '.$AssInfo->get('Name').' ('.$AssInfo->get('ID').')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This section allows you to view data scored for all assessments for a given student. Move forward or backwards by clicking the "Next Page" and :Previous Page" links. The options in the left-hand panel allow you to generate custom reports. To generate a basic report including all assessments, choose "Generate Baseline Report." To generate a Status Report or a Program Worksheet, select the tasks to include by highlighting the task(s), then click "Generate Status Report" or "Generate Program Worksheet." To view completed or incomplete items only, use the "Completed Items" or "Incomplete Items" links</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>