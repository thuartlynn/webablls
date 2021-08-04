<?php
  use App\Services\UtilsService;
  $Utils = new UtilsService();
  $title_name = $Utils->GetNameByFormat($User->get("FirstName"), $User->get("LastName"));

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Replacement for User / '.$title_name.' ('.$User->get("Email").')</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              This screen displays a list of all students within the organization related to the selected user account (shared students registered to other organizations will not be displayed). The table displays information in the Student List format. To manage related students, click the corresponding row to highlight then click the Select Replacement link from the Actions panel to transfer the student to another user within the organization. To transfer ALL students, use the Select Replacement for All link.
              <!--a href="http://support.webablls.net/customer/en/portal/articles/2534547-manage-user---related-students" target="_blank">Learn more</a-->  
            </p>
           <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Replacement for User / '.$title_name.' ('.$User->get("Email").')</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              This screen displays a list of all students within the organization related to the selected user account (shared students registered to other organizations will not be displayed). The table displays information in the Student List format. To manage related students, click the corresponding row to highlight then click the Select Replacement link from the Actions panel to transfer the student to another user within the organization. To transfer ALL students, use the Select Replacement for All link.
              <!--a href="http://support.webablls.net/customer/en/portal/articles/2534547-manage-user---related-students" target="_blank">Learn more</a-->  
            </p>
           <div class="button">Hide help</div>
          </div>';
  }
?>