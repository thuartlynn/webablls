<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Order History</h1>
            
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>
                This screen provides order status and history related to orders placed within the WebABLLS 2.0
              </p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Order History</h1>
            
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>
                This screen provides order status and history related to orders placed within the WebABLLS 2.0
              </p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>