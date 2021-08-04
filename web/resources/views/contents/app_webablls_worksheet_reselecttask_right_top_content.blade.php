<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Program Worksheet(變數區) / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              Reselect Tasks - Remove or Add task selections and click the Save Changes link in the Actions panel to return to the Program Worksheet screen.
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Program Worksheet(變數區) / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              Reselect Tasks - Remove or Add task selections and click the Save Changes link in the Actions panel to return to the Program Worksheet screen.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>