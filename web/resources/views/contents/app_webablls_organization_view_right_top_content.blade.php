<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Organization Details</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
            This screen is available to user accounts assigned with an Organization Administrator role. Your organization details reflect the information provided upon activation and include the organization name along with information regarding the subscription\'s expiration date, reserved seats, and used seats.
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Organization Details</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
            This screen is available to user accounts assigned with an Organization Administrator role. Your organization details reflect the information provided upon activation and include the organization name along with information regarding the subscription\'s expiration date, reserved seats, and used seats.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>