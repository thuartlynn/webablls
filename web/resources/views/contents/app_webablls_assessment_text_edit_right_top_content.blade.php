<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Assessment - Text Edit / '.$AssInfo->get('Name').' ('.$AssInfo->get('ID').')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>The list below contains all tasks in a given category. To mark the score of the student on a given task, click on the box next to the task. Remember to save changes before leaving the page. All unsaved data will be lost. To navigate between the tasks by category or student assessment, use the Categories panel.</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Assessment - Text Edit / '.$AssInfo->get('Name').' ('.$AssInfo->get('ID').')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>The list below contains all tasks in a given category. To mark the score of the student on a given task, click on the box next to the task. Remember to save changes before leaving the page. All unsaved data will be lost. To navigate between the tasks by category or student assessment, use the Categories panel.</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>