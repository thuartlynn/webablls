<?php 
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
  <h1 class="app-right-top-h1 app-nopadding-nomargin">Assessment / '.$Ass_Detail->get('Name').' '.$Ass_Detail->get('ID').' ('.$Ass_Detail->get('AssID').')</h1>
  <button class="btn button" >Show help</button>
  <div class="app-right-top-content app-nopadding-nomargin">            
    This screen allows you to make revisions to the Assessment Details – the assigned date, grade level, color selection(colors cannot be duplicated), and Program Level information can be updated or revised. Click Save Changes when complete.
  </div>
</div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
      <h1 class="app-right-top-h1 app-nopadding-nomargin">Assessment / '.$Ass_Detail->get('Name').' '.$Ass_Detail->get('ID').' ('.$Ass_Detail->get('AssID').')</h1>
      <button class="btn button" >Hide help</button>
      <div class="app-right-top-content app-nopadding-nomargin">            
        This screen allows you to make revisions to the Assessment Details – the assigned date, grade level, color selection(colors cannot be duplicated), and Program Level information can be updated or revised. Click Save Changes when complete.
      </div>
    </div>';
  }
?>