<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Status Report / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              A Status Report is a document that displays a quick reference of the current assessment scoring status with regard to a specific group of selected tasks. As with the Program Worksheet, you will need to start on the Total Grid View screen.To create a Status Report select the skills or tasks to be included in the report by highlighting tasks from the Total Grid View screen. WebABLLS allows up to 50 tasks for selection for any one Status Report - there is a Limit counter located just below the Actions box on the Total Grid View screen. Once the desired tasks are selected, click the Generate Status Report link from the Actions box to create the report.            </div>
            <div class="button">Show help</div>
         </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Status Report / '.$Faker_Student["Name"].' ('.$Faker_Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              A Status Report is a document that displays a quick reference of the current assessment scoring status with regard to a specific group of selected tasks. As with the Program Worksheet, you will need to start on the Total Grid View screen.To create a Status Report select the skills or tasks to be included in the report by highlighting tasks from the Total Grid View screen. WebABLLS allows up to 50 tasks for selection for any one Status Report - there is a Limit counter located just below the Actions box on the Total Grid View screen. Once the desired tasks are selected, click the Generate Status Report link from the Actions box to create the report.            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>


<!-- <div id="popup1" class="overlay">
	<div class="popup">
		<h5>Set Assigned Date</h5>
		<a class="close" href="#">&times;</a>
		<div class="content">
      Input the new Assigned Date or select it using the widget below.<br>
      Current Assigned Date: 11/26/2018<br>
      New Assigned Date: <input type="text" />
		</div>
	</div>
</div> -->


