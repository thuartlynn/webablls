<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Add Student</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              Add a new student profile by completing the fields below and choosing suitable options from drop-down lists. If your organization follows a policy of non-disclosure regarding personl data, use a Student ID instead of a last name in the "Last Name or Student ID" field. Some of the fields are specific for your organization.
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Add Student</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              Add a new student profile by completing the fields below and choosing suitable options from drop-down lists. If your organization follows a policy of non-disclosure regarding personl data, use a Student ID instead of a last name in the "Last Name or Student ID" field. Some of the fields are specific for your organization.
            <!--a href="#">Learn more</a-->
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>
