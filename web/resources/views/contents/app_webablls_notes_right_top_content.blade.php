<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-nopadding-nomargin">Assessment Notes / '.$Students["Name"].'('.$Students["ID"].')</h1>
            <button class="btn button" >Show help</button>
              <div class="app-right-top-content app-nopadding-nomargin">
                Select options from the Type and Catefory panels to generate a listing of task notes entered within the student\'s assessment(s). Selection filters include Show All, Show only Open (notes that are marked as open), or Show only Private. Notes can be selected for all categories or a specific category.
              </div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-nopadding-nomargin">Assessment Notes / '.$Students["Name"].'('.$Students["ID"].')</h1>
            <button class="btn button" >Hide help</button>
              <div class="app-right-top-content app-nopadding-nomargin">
                Select options from the Type and Catefory panels to generate a listing of task notes entered within the student\'s assessment(s). Selection filters include Show All, Show only Open (notes that are marked as open), or Show only Private. Notes can be selected for all categories or a specific category.
              </div>
          </div>';
  }
?>
