<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Account Details</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              The Accounts Details screen is where you can modify your account information and set account preferences. Some of the user preferences will vary depending on your Organization permissions.
              <!--a href="http://support.webablls.net/customer/en/portal/articles/2534545-what-are-account-details" target="_blank">Learn more</a-->  
            </p>
           <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Account Details</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              The Accounts Details screen is where you can modify your account information and set account preferences. Some of the user preferences will vary depending on your Organization permissions.
              <!--a href="http://support.webablls.net/customer/en/portal/articles/2534545-what-are-account-details" target="_blank">Learn more</a-->  
            </p>
           <div class="button">Hide help</div>
          </div>';
  }
?>