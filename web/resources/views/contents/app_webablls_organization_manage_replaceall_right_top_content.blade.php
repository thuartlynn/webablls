<?php
  use App\Services\UtilsService;
  $Utils = new UtilsService();
  $title_name = $Utils->GetNameByFormat($User->get("FirstName"), $User->get("LastName"));

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Replacement for User / '.$title_name.' ('.$User->get("Email").')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays the drop-down field to transfer all students related to a user account from one user to another user within the organization. Select the replacement user from the drop-down list and click the Transfer rights link.
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Replacement for User / '.$title_name.' ('.$User->get("Email").')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays the drop-down field to transfer all students related to a user account from one user to another user within the organization. Select the replacement user from the drop-down list and click the Transfer rights link.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>