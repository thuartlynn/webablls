<?php

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student History / '.$Student["Name"].'('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This section provides a list of all users who view this student summary. The table below includes the date and time of the action, name of the user who performed it and a shortened description of the action itself.            
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Student History / '.$Student["Name"].'('.$Student["ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This section provides a list of all users who view this student summary. The table below includes the date and time of the action, name of the user who performed it and a shortened description of the action itself. 
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>