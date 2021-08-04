<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Change email</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              This screen allows you to make revisions to your email address, which is your User ID to login to WebABLLS. Enter and confirm your new email address and click the Change Email link at the bottom of the form or from the Actions panel. NOTE: Upon completion of changing your email address, you will be logged out of WebABLLS automatically and will need to login using your new email address (User ID).
            </p>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Change email</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              This screen allows you to make revisions to your email address, which is your User ID to login to WebABLLS. Enter and confirm your new email address and click the Change Email link at the bottom of the form or from the Actions panel. NOTE: Upon completion of changing your email address, you will be logged out of WebABLLS automatically and will need to login using your new email address (User ID).
            </p>
            <div class="button">Hide help</div>
          </div>';
  }
?>