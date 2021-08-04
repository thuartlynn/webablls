<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">No user account exists for the email address entered. A user account must be created by an Administrator User via the Add User link located in the Organization panel. An existing user account is necessary for share permissions to be enabled.</span>  
  </div>
</div>

<?php
  echo '<div>
          <h1 style="display: inline;" class="app-right-bottom-h1 app-right-bottom-h1-mr">Personal Contacts</h1>
          <p id="pager1_collapse" class="ml-2" style="display: inline; font-size: 10pt; font-weight: bold; cursor: pointer; color: #127ebf;">Collapse</p>
        </div>';

  if (sizeof($Personal_Contacts_List) > 0) {
    if (sizeof($Personal_Contacts_List) > 50) {
      echo '<div id="pager1" class="pager1 app-nopadding-nomargin margin-bottom: -10px;">
              <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
              <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
            </div>';
    }
    
    echo '<table id="table1" class="table1 tablesorter app-nopadding-nomargin">';
    echo '<thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Organization</th>
              <th>Is User</th>
            </tr>
          </thead>';
  
    echo '<tbody>';
      foreach($Personal_Contacts_List as $value) {
        echo '<tr data-table-row-id="'.$value["ID"].'">';
          echo '<td>';
            echo $value["Name"];
          echo '</td>';
          echo '<td>';
            echo '<a style="text-decoration:underline; color: #337ab7;" href="mailto:'.$value["Email"].'">'.$value["Email"].'</a>';
          echo '</td>';
          echo '<td>';
            echo $value["Organization"];
          echo '</td>';
          echo '<td>';
            if ($value["IsUser"] == 1) {
              echo "Yes";
            } else {
              echo '<span style="color:red;" class="poptext">No<i class="fas fa-question-circle fa-lg ml-1"></i></span>';
            }
          echo '</td>';
        echo '</tr>';
      }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p id="table1" class="app-right-bottom-content">No contacts to display.</p>';
  }
?>

<?php
  echo '<div class="mt-3">
          <h1 style="display: inline;" class="app-right-bottom-h1 app-right-bottom-h1-mr">Organization Support</h1>
          <p id="pager2_collapse" class="ml-2" style="display: inline; font-size: 10pt; font-weight: bold; cursor: pointer; color: #127ebf;">Collapse</p>
        </div>';
  
  if (sizeof($Organization_Support_List) > 0) {
    if (sizeof($Organization_Support_List) > 50) {
      echo '<div id="pager2" class="pager2 app-nopadding-nomargin margin-bottom: -10px;">
              <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
              <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
            </div>';
    }
  
    echo '<table id="table2" class="table2 tablesorter app-nopadding-nomargin">';
    echo '<thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Organization</th>
            </tr>
          </thead>';
  
    echo '<tbody>';
      foreach($Organization_Support_List as $value) {
        echo '<tr data-table-row-id="'.$value["ID"].'">';
          echo '<td>';
            echo $value["Name"];
          echo '</td>';
          echo '<td>';
            echo '<a style="text-decoration:underline; color: #337ab7;" href="mailto:'.$value["Email"].'">'.$value["Email"].'</a>';
          echo '</td>';
          echo '<td>';
            echo $value["Organization"];
          echo '</td>';
        echo '</tr>';
      }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p id="table2" class="app-right-bottom-content">No contacts to display.</p>';
  }
?>

<?php
  echo '<div class="mt-3">
          <h1 style="display: inline;" class="app-right-bottom-h1 app-right-bottom-h1-mr">Organization Members</h1>
          <p id="pager3_collapse" class="ml-2" style="display: inline; font-size: 10pt; font-weight: bold; cursor: pointer; color: #127ebf;">Collapse</p>
        </div>';
  
  if (sizeof($Organization_Members_List) > 0) {
    if (sizeof($Organization_Members_List) > 50) {
      echo '<div id="pager3" class="pager3 app-nopadding-nomargin margin-bottom: -10px;">
              <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
              <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
            </div>';
    }
  
    echo '<table id="table3" class="table3 tablesorter app-nopadding-nomargin">';
    echo '<thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Organization</th>
            </tr>
          </thead>';
  
    echo '<tbody>';
      foreach($Organization_Members_List as $value) {
        echo '<tr data-table-row-id="'.$value["ID"].'">';
          echo '<td>';
            echo $value["Name"];
          echo '</td>';
          echo '<td>';
            echo '<a style="text-decoration:underline; color: #337ab7;" href="mailto:'.$value["Email"].'">'.$value["Email"].'</a>';
          echo '</td>';
          echo '<td>';
            echo $value["Organization"];
          echo '</td>';
        echo '</tr>';
      }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p id="table3" class="app-right-bottom-content">No contacts to display.</p>';
  }
?>

<?php
  echo '<div class="mt-3">
          <h1 style="display: inline;" class="app-right-bottom-h1 app-right-bottom-h1-mr">WebABLLS Support</h1>
          <p id="pager4_collapse" class="ml-2" style="display: inline; font-size: 10pt; font-weight: bold; cursor: pointer; color: #127ebf;">Collapse</p>
        </div>';
  
  if (sizeof($Organization_Members_List) > 0) {
    if (sizeof($WebABBLS_Support_List) > 50) {
      echo '<div id="pager4" class="pager4 app-nopadding-nomargin margin-bottom: -10px;">
              <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
              <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
            </div>';
    }
  
    echo '<table id="table4" class="table4 tablesorter app-nopadding-nomargin">';
    echo '<thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Organization</th>
            </tr>
          </thead>';
  
    echo '<tbody>';
      foreach($WebABBLS_Support_List as $value) {
        echo '<tr data-table-row-id="'.$value["ID"].'">';
          echo '<td>';
            echo $value["Name"];
          echo '</td>';
          echo '<td>';
            echo '<a style="text-decoration:underline; color: #337ab7;" href="mailto:'.$value["Email"].'">'.$value["Email"].'</a>';
          echo '</td>';
          echo '<td>';
            echo $value["Organization"];
          echo '</td>';
        echo '</tr>';
      }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p id="table4" class="app-right-bottom-content">No contacts to display.</p>';
  }
?>