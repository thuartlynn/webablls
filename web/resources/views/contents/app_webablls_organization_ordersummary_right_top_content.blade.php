<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Order Summary</h1>
            <p class="app-right-top-content app-nopadding-nomargin">Review the information in Order Summary</p>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Order Summary</h1>
            <p class="app-right-top-content app-nopadding-nomargin">Review the information in Order Summary</p>
            <div class="button">Hide help</div>
          </div>';
  }
?>