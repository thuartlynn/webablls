<?php
  use App\Services\UtilsService;
  $Utils = new UtilsService();
  $title_name = $Utils->GetNameByFormat($User->get("FirstName"), $User->get("LastName"));

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Change User Role / '.$title_name.' ('.$User->get("Email").')</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              Select new user account Role from the drop-down list and click the <b>Change Role link</b>
            </p>
            <div class="app-right-top-content app-nopadding-nomargin hidden">
              <ul>
                <li class="app-nopadding-nomargin"><b>Standard user</b> can use all basic features</li>
                <li class="app-nopadding-nomargin"><b>Organization Administrator user</b> can use additional organization management features</li>
                <li class="app-nopadding-nomargin"><b>Restricted user</b> must be authorized with student share permissions to access features</li>
                <!--a href="http://support.webablls.net/customer/en/portal/articles/2898808-overview-%7C-user-account-roles" target="_blank">Learn more</a-->  
              </ul>
            </div>
           <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Change User Role / '.$title_name.' ('.$User->get("Email").')</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              Select new user account Role from the drop-down list and click the Change Role link
            </p>
            <div class="app-right-top-content app-nopadding-nomargin hidden">
              <ul>
                <li class="app-nopadding-nomargin"><b>Standard user</b> can use all basic features</li>
                <li class="app-nopadding-nomargin"><b>Organization Administrator user</b> can use additional organization management features</li>
                <li class="app-nopadding-nomargin"><b>Restricted user</b> must be authorized with student share permissions to access features</li>
                <!--a href="http://support.webablls.net/customer/en/portal/articles/2898808-overview-%7C-user-account-roles" target="_blank">Learn more</a-->  
              </ul>
            </div>
           <div class="button">Hide help</div>
          </div>';
  }
?>