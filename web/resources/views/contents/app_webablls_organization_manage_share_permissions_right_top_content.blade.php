<?php
  use App\Services\UtilsService;
  $Utils = new UtilsService();
  $title_name = $Utils->GetNameByFormat($User->get("FirstName"), $User->get("LastName"));

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Share Permissions by User / '.$title_name.' ('.$User->get("Email").')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>
                The table below includes student profiles directly from your Student Roster. To link the target user account with share permissions, select the type and level of permissions from the drop-down fields by column for each student profile to be linked.
              </p>
              <p style="color:red">Note: Share permissions can be authorized, revised, or removed at any time.</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Share Permissions by User / '.$title_name.' ('.$User->get("Email").')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>
                The table below includes student profiles directly from your Student Roster. To link the target user account with share permissions, select the type and level of permissions from the drop-down fields by column for each student profile to be linked.
              </p>
              <p style="color:red">Note: Share permissions can be authorized, revised, or removed at any time.</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>