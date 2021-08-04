<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Share Student / '.$Student["Name"].' ('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              The share student page allows share permissions to be authorized (or linked) to a student profile with other WebABLLS users. Granting "Owner Rights" to another user is only possible for the owner rights\' holders. When "Owner Rights" are linked to another user, both users have equal permissions to a student profile and the owner rights can be withdrawn by another owner. Further options on this page allow various levels of share permissions with viewing or modifying possibilities for student basic information, assessments and reports, and/or files. The users listed below are users registered to the organization (Organization Members and Organization Support) and users added as contacts (personal contacts), which can be from either contacts used frequently from the members\' list or any user account within the entire WebABLLS community.
            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Share Student / '.$Student["Name"].' ('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              The share student page allows share permissions to be authorized (or linked) to a student profile with other WebABLLS users. Granting "Owner Rights" to another user is only possible for the owner rights\' holders. When "Owner Rights" are linked to another user, both users have equal permissions to a student profile and the owner rights can be withdrawn by another owner. Further options on this page allow various levels of share permissions with viewing or modifying possibilities for student basic information, assessments and reports, and/or files. The users listed below are users registered to the organization (Organization Members and Organization Support) and users added as contacts (personal contacts), which can be from either contacts used frequently from the members\' list or any user account within the entire WebABLLS community.
              <!--a href="#">Learn more</a-->
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>
