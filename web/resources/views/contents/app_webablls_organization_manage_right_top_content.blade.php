<?php
  use App\Services\UtilsService;
  $Utils = new UtilsService();
  $title_name = $Utils->GetNameByFormat($User->get("FirstName"), $User->get("LastName"));

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Manage User Account / '.$title_name.' ('.$User->get("Email").')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen allows the Organization Administrator to revise or edit fields and preferences related to a user account within the organization. Enter changes and click the Save Details link at the bottom of the screen or within the Actions panel.
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Manage User Account / '.$title_name.' ('.$User->get("Email").')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen allows the Organization Administrator to revise or edit fields and preferences related to a user account within the organization. Enter changes and click the Save Details link at the bottom of the screen or within the Actions panel.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>