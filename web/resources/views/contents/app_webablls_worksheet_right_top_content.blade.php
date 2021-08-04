<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Program Worksheet(變數區) / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              The Program Worksheet section is where you will customize the objectives associated with the tasks selected form the Total Grid View screen. Important First Steps: Select a report title from drop-down list(located in the banner of the report); Enter assigned date(see note below regarding date stamps).
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Program Worksheet(變數區) / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              The Program Worksheet section is where you will customize the objectives associated with the tasks selected form the Total Grid View screen. Important First Steps: Select a report title from drop-down list(located in the banner of the report); Enter assigned date(see note below regarding date stamps).
            </div>
            <!--a href="#">Learn more</a-->
            <div class="button">Hide help</div>
          </div>';
  }
?>