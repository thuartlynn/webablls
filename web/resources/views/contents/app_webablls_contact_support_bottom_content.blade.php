<div>
  <p class="app-right-bottom-h1-2 app-nopadding-nomargin">You can also contact us via phone and email:</p>
  <p class="app-right-bottom-content app-nopadding-nomargin">Phone (925) 210-9374</p>
  <p class="app-right-bottom-content app-nopadding-nomargin">Phone (925) 210-9373</p>
  <p class="app-right-bottom-content app-nopadding-nomargin">Email <a style="text-decoration:underline; color: #337ab7;" href="mailto:support@webablls.net">support@webablls.net</a></p>

  <p class="app-right-bottom-h1-2" style="margin: 20px 0 0 0;">Your Contact Information</p>

  <p class="app-right-bottom-title app-nopadding-nomargin">Name</p>
  <?php
  $name = "";
    if (Auth::user()->name_format == 0) {
      echo '<p class="app-right-bottom-content app-nopadding-nomargin">'.Auth::user()->last_name.' '.Auth::user()->first_name.'</p>';
    } else {
      echo '<p class="app-right-bottom-content app-nopadding-nomargin">'.Auth::user()->first_name.' '.Auth::user()->last_name.'</p>';
    }
  ?>

  <p class="app-right-bottom-title app-nopadding-nomargin">Email</p>
  <p class="app-right-bottom-content app-nopadding-nomargin">{{Auth::user()->email}}</p>

  <p class="app-right-bottom-title app-nopadding-nomargin">Phone</p>
  <?php
    if (Auth::user()->phone_number == "") {
      echo '<p class="app-right-bottom-content app-nopadding-nomargin">n/a</p>';
    } else {
      echo '<p class="app-right-bottom-content app-nopadding-nomargin">'.Auth::user()->phone_number.'</p>';
    }
  ?>

  <p class="app-right-bottom-h1-2" style="margin: 20px 0 0 0;">General Message</p>

  <p class="app-right-bottom-title" style="margin: 5px 0 0 0;">Subject</p>
  <input class="app-right-bottom-input form-control app-option-font" style="margin: 5px 0 0 0;" id="Subject" name="Subject" type="text" value=""/>

  <p class="app-right-bottom-title app-nopadding-nomargin">Message</p>
  <textarea class="form-control rounded-0 app-option-font app-textarea" style="margin: 5px 0 0 0;" id="Message" name="Message"></textarea>

  <button style="margin: 20px 0 0 0;" class="btn btn-sm btn-secondary" type="button">Send Support Message</button>
</div>