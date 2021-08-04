<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Settings</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen allows the session timeout period to be set to adhere to an organization standards. Select the desired time period from the drop-down list and click the Save Changes link on the screen or from the Actions panel. Note: Depending on the configurations of an Organization (or customer account), the timeout settings may be managed by the Organization Administrator or can be managed within the Account section by the user.
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Settings</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen allows the session timeout period to be set to adhere to an organization standards. Select the desired time period from the drop-down list and click the Save Changes link on the screen or from the Actions panel. Note: Depending on the configurations of an Organization (or customer account), the timeout settings may be managed by the Organization Administrator or can be managed within the Account section by the user.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>