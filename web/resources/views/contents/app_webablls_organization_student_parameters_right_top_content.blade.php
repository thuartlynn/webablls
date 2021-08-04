<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Organization Parameters</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              Organization parameters provide a mechanism for organizations to define unique or custom markers that will appear in a ﾑlocation\' field within the Student Profile. Parameters can be school sites, agency locations, classrooms, or any other type of segment or section that defines a group or cluster of students. For example, if a parameter is set for ABC Classroom, then within the Student List filters, the user can select the ABC Classroom to see only those specific students.
              <!--a href="http://support.webablls.net/customer/en/portal/articles/2534548-student-parameters" target="_blank">Learn more</a-->  
            </p>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Organization Parameters</h1>
            <p class="app-right-top-content app-nopadding-nomargin">            
              Organization parameters provide a mechanism for organizations to define unique or custom markers that will appear in a ﾑlocation\' field within the Student Profile. Parameters can be school sites, agency locations, classrooms, or any other type of segment or section that defines a group or cluster of students. For example, if a parameter is set for ABC Classroom, then within the Student List filters, the user can select the ABC Classroom to see only those specific students.
              <!--a href="http://support.webablls.net/customer/en/portal/articles/2534548-student-parameters" target="_blank">Learn more</a-->  
            </p>
            <div class="button">Hide help</div>
          </div>';
  }
?>