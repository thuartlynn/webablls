<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Organization User List</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays a list of all user accounts registered to an organization (or customer account). The table below displays the user\'s name, email address, and account role setting. To manage a user account, click the corresponding row to highlight then click the desired action from the Actions panel. The Organization User List display can be sorted by any column by clicking the column title. To select a secondary sort order, hold the shift key while selecting the second column. Use the User List filters for quick access to a particular user account. Simply enter search parameters, click the Filter link, and the results will display immediately.
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Organization User List</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen displays a list of all user accounts registered to an organization (or customer account). The table below displays the user\'s name, email address, and account role setting. To manage a user account, click the corresponding row to highlight then click the desired action from the Actions panel. The Organization User List display can be sorted by any column by clicking the column title. To select a secondary sort order, hold the shift key while selecting the second column. Use the User List filters for quick access to a particular user account. Simply enter search parameters, click the Filter link, and the results will display immediately.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>