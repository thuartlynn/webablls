<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Progress Report(變數區) / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              A Progress Report corresponds with a specific Program Worksheet and provides a simple way to update benchmark milestones with regard to skill acquisition. To create a Progress Report, click the Generate Progress Report link from the Actions panel (while on the Program Worksheet screen). WebABLLS will display the corresponding Progress Report with the original "Current Level" text transferred to the "Previous Level" column - so the new Current Level of performance information can be entered. A corresponding Progress Report can be created as many times as necessary - weekly, bi-weekly, monthly, etc. Progress Reports, with or without notes, can be downloaded as a PDF or CSV file - click the preferred download from the Actions panel from the Progress Report screen.
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Progress Report(變數區) / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
            A Progress Report corresponds with a specific Program Worksheet and provides a simple way to update benchmark milestones with regard to skill acquisition. To create a Progress Report, click the Generate Progress Report link from the Actions panel (while on the Program Worksheet screen). WebABLLS will display the corresponding Progress Report with the original "Current Level" text transferred to the "Previous Level" column - so the new Current Level of performance information can be entered. A corresponding Progress Report can be created as many times as necessary - weekly, bi-weekly, monthly, etc. Progress Reports, with or without notes, can be downloaded as a PDF or CSV file - click the preferred download from the Actions panel from the Progress Report screen.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>