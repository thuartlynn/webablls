<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Change password</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              This screen allows you to change your password. Complete the Old Password, New Password, and Confirm Password fields then click the Change Password link at the bottom of the form or from the Actions panel. Passwords must contain at least nine (9) characters and/or numbers.
            </p>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Change password</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              This screen allows you to change your password. Complete the Old Password, New Password, and Confirm Password fields then click the Change Password link at the bottom of the form or from the Actions panel. Passwords must contain at least nine (9) characters and/or numbers.
            </p>
            <div class="button">Hide help</div>
          </div>';
  }
?>