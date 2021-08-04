<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
  <h1 class="app-right-top-h1 app-nopadding-nomargin">Student Files / '.$Student["Name"].' ('.$Student["ID"].')</h1>
  <button class="btn button" >Show help</button>
  <div class="app-right-top-content app-nopadding-nomargin">            
    This screen displays a list of all student profiles linked to a user account - both assigned students and shared students. The table below displays information on each student (ID#, name, user permissions, gender, date of birth, profile creation date, and the location parameter (when set by the Organization administrator and entered in the student profile). To select a student profile to perform an action, click the corresponding row to highlight then click the desired action from the Actions panel. Different actions are available and may vary depending on the permissions authorized to the user. The ID# is linked directly to the Student Profile screen. The Name is linked directly to the corresponding Student Summary screen.
  <!--a href="#">Learn more</a-->
  </div>
</div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
      <h1 class="app-right-top-h1 app-nopadding-nomargin">Student Files / '.$Student["Name"].' ('.$Student["ID"].')</h1>
      <button class="btn button" >Hide help</button>
      <div class="app-right-top-content app-nopadding-nomargin">            
        This screen displays a list of all student profiles linked to a user account - both assigned students and shared students. The table below displays information on each student (ID#, name, user permissions, gender, date of birth, profile creation date, and the location parameter (when set by the Organization administrator and entered in the student profile). To select a student profile to perform an action, click the corresponding row to highlight then click the desired action from the Actions panel. Different actions are available and may vary depending on the permissions authorized to the user. The ID# is linked directly to the Student Profile screen. The Name is linked directly to the corresponding Student Summary screen.
      <!--a href="#">Learn more</a-->
      </div>
    </div>';
  }
?>
