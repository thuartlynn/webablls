<?php
  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Add User Account</h1>
            
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>
                Complete the form to create a new user account within your organization. All fields must be set. Email must be valid. The user will receive password via welcome email. Only one account per email is allowed.
              </p>
              <ul>
                <li class="app-nopadding-nomargin">Standard user can use all basic features</li>
                <li class="app-nopadding-nomargin">Organization Administrator user can use additional organization management features</li>
                <li class="app-nopadding-nomargin">Restricted user must be authorized with student share permissions to access features</li>
              </ul>
  
              <p>Complete the first name, last name, and email address fields, select the user account role type, and preferred language then click <b>Add User</b> to complete the activation or <b>Add User + Link Share Permissions</b> to activate user and link share permissions to designated students. WebABLLS will generate a temporary password that will be sent automatically to the email address registered.</p>
              <p>Click <b>Add User</b> to activate the user account in the system with no linked students</p>
              <p>Click <b>Add User + Link Share Permissions</b> to link user with share permissions to designated students</p>
  
              <p style="color:red">Notes:</p>
              <ul style="color:red">
                <li>User accounts are not automatically linked with share permissions to student profiles within an organization.</li>
                <li>Share permissions can be authorized, revised, or removed at any time.</li>
                <li>Error message will occur if an existing user account is already assigned to the email address.</li>
              </ul>
            </div>
            <div class="button">Show help</div>
           </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Add User Account</h1>
            
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>
                Complete the form to create a new user account within your organization. All fields must be set. Email must be valid. The user will receive password via welcome email. Only one account per email is allowed.
              </p>
              <ul>
                <li class="app-nopadding-nomargin">Standard user can use all basic features</li>
                <li class="app-nopadding-nomargin">Organization Administrator user can use additional organization management features</li>
                <li class="app-nopadding-nomargin">Restricted user must be authorized with student share permissions to access features</li>
              </ul>
  
              <p>Complete the first name, last name, and email address fields, select the user account role type, and preferred language then click <b>Add User</b> to complete the activation or <b>Add User + Link Share Permissions</b> to activate user and link share permissions to designated students. WebABLLS will generate a temporary password that will be sent automatically to the email address registered.</p>
              <p>Click <b>Add User</b> to activate the user account in the system with no linked students</p>
              <p>Click <b>Add User + Link Share Permissions</b> to link user with share permissions to designated students</p>
  
              <p style="color:red">Notes:</p>
              <ul style="color:red">
                <li>User accounts are not automatically linked with share permissions to student profiles within an organization.</li>
                <li>Share permissions can be authorized, revised, or removed at any time.</li>
                <li>Error message will occur if an existing user account is already assigned to the email address.</li>
              </ul>
            </div>
            <div class="button">Hide help</div>
           </div>';
  }
?>