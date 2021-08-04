<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Addresses</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen allows you to manage (add, edit and delete) company addresses. These addresses can be used during the ordering process as a billing and shipping addresses.
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Addresses</h1>
            <div class="app-right-top-content app-nopadding-nomargin">            
              This screen allows you to manage (add, edit and delete) company addresses. These addresses can be used during the ordering process as a billing and shipping addresses.
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>