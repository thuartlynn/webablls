
<?php
  $url = url('/Contact/Add/');
  echo '<form action="'.$url.'/'.Auth::user()->user_id.'" class="app-inline needs-validation" id="AddContactfrm" method="post" role="form" novalidate>';
?>
  {{ csrf_field() }}

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Contact Name</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Contact_Name" name="Contact_Name" type="text" required/>
    <div id="Contact_Name_Required" class="invalid-feedback">Contact Name field is required</div>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title">Contact E-mail address</label>
    <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Contact_Email" name="Contact_Email" type="text" required pattern="(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*))@([a-zA-Z0-9-]+[.])+([a-zA-Z]{2}|net|com|gov|mil|org|edu|int|name|asia)"/>
    <div id="Contact_Email_Required" class="invalid-feedback">Contact E-mail address field is required</div>
  </div>

  <input type="submit" value="Add Contact" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>