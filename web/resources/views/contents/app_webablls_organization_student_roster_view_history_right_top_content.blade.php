<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student History ('.$Auth.') / '.$Student["Name"].' ('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen allows the Organization Administrator to view the electronic date/timestamp generated with general functions related to a student profile. The history is stored within monthly increments. Click on the desired month to view the associated history. The display provides the date, time, user name, and a shortened description of the action performed.
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student History ('.$Auth.') / '.$Student["Name"].' ('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen allows the Organization Administrator to view the electronic date/timestamp generated with general functions related to a student profile. The history is stored within monthly increments. Click on the desired month to view the associated history. The display provides the date, time, user name, and a shortened description of the action performed.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>