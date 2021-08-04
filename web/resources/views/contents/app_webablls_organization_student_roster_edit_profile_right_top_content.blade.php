<?php
  use App\Enums\UserRole;

  if (strval(Auth::user()->role) == UserRole::Standard()) {
    $Auth = 'Std.';
  } else if (strval(Auth::user()->role) == UserRole::Administrator()) {
    $Auth = 'Admin';
  } else {
    $Auth = 'RES.';
  }

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student Profile ('.$Auth.') / '.$Student["Name"].' ('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>
                This screen allows the Organization Administrator to revise or edit fields related to a student profile within the organization. Enter changes and click the Save Details link at the bottom of the screen or within the Actions panel.
              </p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student Profile ('.$Auth.') / '.$Student["Name"].' ('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>
              This screen allows the Organization Administrator to revise or edit fields related to a student profile within the organization. Enter changes and click the Save Details link at the bottom of the screen or within the Actions panel.
              </p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>