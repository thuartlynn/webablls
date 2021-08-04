<?php
  use App\Enums\UserRole;
?>

<!--div class="app-left-pan">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Add Contact</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <div class="navbar-nav app-left-pan-list-mr-pd">
      <div style="margin-top: 10px;">
          <p style="display: inline;" class="app-left-pan-first-p">Contact Email:</p>
          <input value="" style="display: inline;" class="form-control app-left-pan-input app-option-font" name="ContactEmail" id="ContactEmail" type="text"/>
          <button class="btn tis-btn-xs btn-secondary" onclick="AddContact()" type="button">Add Contact</button>
          <p style="margin-left: 5px; display: inline;" id="addcontact_error" class="app-left-pan-first-p hide">Enter email address.</p>
      </div>
    </div>
  </nav>
</div-->

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Share Filter</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Share Filter</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <div class="navbar-nav app-left-pan-list-mr-pd">
      <div style="margin-top: 10px;">
          <p style="display: inline;" class="app-left-pan-first-p">Name:</p>
          <input class="search form-control app-left-pan-input app-option-font" name="Name" id="Name" style="display: inline;" type="search" value="" data-column="0-1"/>
      </div>
    </div>
  </nav>
</div>

<!--div class="app-select-list" style="margin-top: 10px;">
    <span data-index="Authorized_User" class="select">Authorized Users</span>
    <span data-index="Personal_Contacts" class="no-select">Personal Contacts</span>
    <span data-index="Organization_Members" class="no-select">Organization Members</span>
    <span data-index="WebABLLS_Support" class="no-select">WebABLLS Support</span>
</div-->

<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr hide">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Share Permissions have been updated.</span>  
  </div>
</div>

<form action="{{url('/Organization/Students/UserLinks')}}/<?php echo $Student->get("ID")?>" class="app-inline" id="Studentsuserlinksfrm" method="post" role="form" novalidate>
  {{ csrf_field() }}

  <?php
  if (sizeof($Author) > 50) {
    echo '<div id="Authorized_User_Pager" class="Authorized_User_Pager app-nopadding-nomargin hide">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }
  ?>
  
  <table id="Authorized_User_Table" name="Authorized_User_Table" class="tablesorter hide" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Organization Name</th>
        <th>Owner Rights</th>
        <th>Full Access</th>
        <th>Basic info</th>
        <th>Assessments and Reports</th>
        <th>Files</th>
        <th style="display: none;">Analytics</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($Author as $value) {
          echo '<tr>';
            echo '<td>';
              echo $value["FirstName"];
            echo '</td>';
            echo '<td>';
              echo $value["LastName"];
            echo '</td>';
            echo '<td>';
              echo $value["OrgName"];
            echo '</td>';
            echo '<td>';
              if ($value["OwnerRights"] == 1) {
                echo '<input type="checkbox" class="OwnerRights" name="Authorized_User_Table['.$value["ID"].'][OwnerRights]" id="Authorized_User_Table['.$value["ID"].'].OwnerRights" value="1" checked="checked"/>';
              } else {
                echo '<input type="checkbox" class="OwnerRights" name="Authorized_User_Table['.$value["ID"].'][OwnerRights]" id="Authorized_User_Table['.$value["ID"].'].OwnerRights" value="0"/>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["FullAccess"] == 2) {
                echo '<select class="FullAccess" id="Authorized_User_Table['.$value["ID"].'].FullAccess" name="Authorized_User_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">FA</option>
                        <option selected="selected" value="2">FA w. Share</option>
                      </select>';
              } else if ($value["FullAccess"] == 1) {
                echo '<select class="FullAccess" id="Authorized_User_Table['.$value["ID"].'].FullAccess" name="Authorized_User_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              } else {
                echo '<select class="FullAccess" id="Authorized_User_Table['.$value["ID"].'].FullAccess" name="Authorized_User_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["BasicInfo"] == 2) {
                echo '<select class="BasicInfo" id="Authorized_User_Table['.$value["ID"].'].BasicInfo" name="Authorized_User_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["BasicInfo"] == 1) {
                echo '<select class="BasicInfo" id="Authorized_User_Table['.$value["ID"].'].BasicInfo" name="Authorized_User_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="BasicInfo" id="Authorized_User_Table['.$value["ID"].'].BasicInfo" name="Authorized_User_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["AssessmentsAndReports"] == 2) {
                echo '<select class="AssessmentsAndReports" id="Authorized_User_Table['.$value["ID"].'].AssessmentsAndReports" name="Authorized_User_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["AssessmentsAndReports"] == 1) {
                echo '<select class="AssessmentsAndReports" id="Authorized_User_Table['.$value["ID"].'].AssessmentsAndReports" name="Authorized_User_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="AssessmentsAndReports" id="Authorized_User_Table['.$value["ID"].'].AssessmentsAndReports" name="Authorized_User_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["Files"] == 2) {
                echo '<select class="Files" id="Authorized_User_Table['.$value["ID"].'].Files" name="Authorized_User_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["Files"] == 1) {
                echo '<select class="Files" id="Authorized_User_Table['.$value["ID"].'].Files" name="Authorized_User_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Files" id="Authorized_User_Table['.$value["ID"].'].Files" name="Authorized_User_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td style="display: none;">';
              if ($value["Analytics"] == 2) {
                echo '<select class="Analytics" id="Authorized_User_Table['.$value["ID"].'].Analytics" name="Authorized_User_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["Analytics"] == 1) {
                echo '<select class="Analytics" id="Authorized_User_Table['.$value["ID"].'].Analytics" name="Authorized_User_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Analytics" id="Authorized_User_Table['.$value["ID"].'].Analytics" name="Authorized_User_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>

  <?php
  if (sizeof($Contact) > 50) {
    echo '<div id="Personal_Contacts_Pager" class="Personal_Contacts_Pager app-nopadding-nomargin hide">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }
  ?>
  
  <table id="Personal_Contacts_Table" name="Personal_Contacts_Table" class="tablesorter hide" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Organization Name</th>
        <th>Owner Rights</th>
        <th>Full Access</th>
        <th>Basic info</th>
        <th>Assessments and Reports</th>
        <th>Files</th>
        <th style="display: none;">Analytics</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($Contact as $value) {
          echo '<tr>';
            echo '<td>';
              echo $value["FirstName"];
            echo '</td>';
            echo '<td>';
              echo $value["LastName"];
            echo '</td>';
            echo '<td>';
              echo $value["OrgName"];
            echo '</td>';
            echo '<td>';
              if ($value["OwnerRights"] == 1) {
                echo '<input type="checkbox" class="OwnerRights" name="Personal_Contacts_Table['.$value["ID"].'][OwnerRights]" id="Personal_Contacts_Table['.$value["ID"].'].OwnerRights" value="1" checked="checked"/>';
              } else {
                echo '<input type="checkbox" class="OwnerRights" name="Personal_Contacts_Table['.$value["ID"].'][OwnerRights]" id="Personal_Contacts_Table['.$value["ID"].'].OwnerRights" value="0"/>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["FullAccess"] == 2) {
                echo '<select class="FullAccess" id="Personal_Contacts_Table['.$value["ID"].'].FullAccess" name="Personal_Contacts_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">FA</option>
                        <option selected="selected" value="2">FA w. Share</option>
                      </select>';
              } else if ($value["FullAccess"] == 1) {
                echo '<select class="FullAccess" id="Personal_Contacts_Table['.$value["ID"].'].FullAccess" name="Personal_Contacts_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              } else {
                echo '<select class="FullAccess" id="Personal_Contacts_Table['.$value["ID"].'].FullAccess" name="Personal_Contacts_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["BasicInfo"] == 2) {
                echo '<select class="BasicInfo" id="Personal_Contacts_Table['.$value["ID"].'].BasicInfo" name="Personal_Contacts_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["BasicInfo"] == 1) {
                echo '<select class="BasicInfo" id="Personal_Contacts_Table['.$value["ID"].'].BasicInfo" name="Personal_Contacts_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="BasicInfo" id="Personal_Contacts_Table['.$value["ID"].'].BasicInfo" name="Personal_Contacts_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["AssessmentsAndReports"] == 2) {
                echo '<select class="AssessmentsAndReports" id="Personal_Contacts_Table['.$value["ID"].'].AssessmentsAndReports" name="Personal_Contacts_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["AssessmentsAndReports"] == 1) {
                echo '<select class="AssessmentsAndReports" id="Personal_Contacts_Table['.$value["ID"].'].AssessmentsAndReports" name="Personal_Contacts_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="AssessmentsAndReports" id="Personal_Contacts_Table['.$value["ID"].'].AssessmentsAndReports" name="Personal_Contacts_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["Files"] == 2) {
                echo '<select class="Files" id="Personal_Contacts_Table['.$value["ID"].'].Files" name="Personal_Contacts_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["Files"] == 1) {
                echo '<select class="Files" id="Personal_Contacts_Table['.$value["ID"].'].Files" name="Personal_Contacts_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Files" id="Personal_Contacts_Table['.$value["ID"].'].Files" name="Personal_Contacts_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td style="display: none;">';
              if ($value["Analytics"] == 2) {
                echo '<select class="Analytics" id="Personal_Contacts_Table['.$value["ID"].'].Analytics" name="Personal_Contacts_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["Analytics"] == 1) {
                echo '<select class="Analytics" id="Personal_Contacts_Table['.$value["ID"].'].Analytics" name="Personal_Contacts_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Analytics" id="Personal_Contacts_Table['.$value["ID"].'].Analytics" name="Personal_Contacts_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>

  <?php
  if (sizeof($OrgMember) > 50) {
    echo '<div id="Organization_Members_Pager" class="Organization_Members_Pager app-nopadding-nomargin">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }
  ?>
  
  <table id="Organization_Members_Table" name="Organization_Members_Table" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Organization Name</th>
        <th>Owner Rights</th>
        <th>Full Access</th>
        <th>Basic info</th>
        <th>Assessments and Reports</th>
        <th>Files</th>
        <th style="display: none;">Analytics</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($OrgMember as $value) {
          echo '<tr>';
            echo '<td>';
              echo $value["FirstName"];
            echo '</td>';
            echo '<td>';
              echo $value["LastName"];
            echo '</td>';
            echo '<td>';
              echo $value["OrgName"];
            echo '</td>';
            echo '<td>';
              if ($value["Role"] == "UserRole::Restricted()") {
                if ($value["OwnerRights"] == 1) {
                  echo '<input disabled type="checkbox" class="OwnerRights" name="Organization_Members_Table['.$value["ID"].'][OwnerRights]" id="Organization_Members_Table['.$value["ID"].'].OwnerRights" value="1" checked="checked"/>';
                } else {
                  echo '<input disabled type="checkbox" class="OwnerRights" name="Organization_Members_Table['.$value["ID"].'][OwnerRights]" id="Organization_Members_Table['.$value["ID"].'].OwnerRights" value="0"/>';
                }
              } else {
                if ($value["OwnerRights"] == 1) {
                  echo '<input type="checkbox" class="OwnerRights" name="Organization_Members_Table['.$value["ID"].'][OwnerRights]" id="Organization_Members_Table['.$value["ID"].'].OwnerRights" value="1" checked="checked"/>';
                } else {
                  echo '<input type="checkbox" class="OwnerRights" name="Organization_Members_Table['.$value["ID"].'][OwnerRights]" id="Organization_Members_Table['.$value["ID"].'].OwnerRights" value="0"/>';
                }
              }
            echo '</td>';
            echo '<td>';
              if ($value["Role"] == "UserRole::Restricted()") {
                if ($value["FullAccess"] == 2) {
                  echo '<select disabled class="FullAccess" id="Organization_Members_Table['.$value["ID"].'].FullAccess" name="Organization_Members_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                          <option value="0">None</option>
                          <option value="1">FA</option>
                          <option selected="selected" value="2">FA w. Share</option>
                        </select>';
                } else if ($value["FullAccess"] == 1) {
                  echo '<select disabled class="FullAccess" id="Organization_Members_Table['.$value["ID"].'].FullAccess" name="Organization_Members_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                          <option value="0">None</option>
                          <option selected="selected" value="1">FA</option>
                          <option value="2">FA w. Share</option>
                        </select>';
                } else {
                  echo '<select disabled class="FullAccess" id="Organization_Members_Table['.$value["ID"].'].FullAccess" name="Organization_Members_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                          <option selected="selected" value="0">None</option>
                          <option value="1">FA</option>
                          <option value="2">FA w. Share</option>
                        </select>';
                }
              } else {
                if ($value["FullAccess"] == 2) {
                  echo '<select class="FullAccess" id="Organization_Members_Table['.$value["ID"].'].FullAccess" name="Organization_Members_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                          <option value="0">None</option>
                          <option value="1">FA</option>
                          <option selected="selected" value="2">FA w. Share</option>
                        </select>';
                } else if ($value["FullAccess"] == 1) {
                  echo '<select class="FullAccess" id="Organization_Members_Table['.$value["ID"].'].FullAccess" name="Organization_Members_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                          <option value="0">None</option>
                          <option selected="selected" value="1">FA</option>
                          <option value="2">FA w. Share</option>
                        </select>';
                } else {
                  echo '<select class="FullAccess" id="Organization_Members_Table['.$value["ID"].'].FullAccess" name="Organization_Members_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                          <option selected="selected" value="0">None</option>
                          <option value="1">FA</option>
                          <option value="2">FA w. Share</option>
                        </select>';
                }
              }
            echo '</td>';
            echo '<td>';
              if ($value["BasicInfo"] == 2) {
                echo '<select class="BasicInfo" id="Organization_Members_Table['.$value["ID"].'].BasicInfo" name="Organization_Members_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["BasicInfo"] == 1) {
                echo '<select class="BasicInfo" id="Organization_Members_Table['.$value["ID"].'].BasicInfo" name="Organization_Members_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="BasicInfo" id="Organization_Members_Table['.$value["ID"].'].BasicInfo" name="Organization_Members_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["Role"] == "UserRole::Restricted()") {
                if ($value["AssessmentsAndReports"] == 2) {
                  echo '<select disabled class="AssessmentsAndReports" id="Organization_Members_Table['.$value["ID"].'].AssessmentsAndReports" name="Organization_Members_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                          <option value="0">None</option>
                          <option value="1">View</option>
                          <option selected="selected" value="2">Modify</option>
                        </select>';
                } else if ($value["AssessmentsAndReports"] == 1) {
                  echo '<select disabled class="AssessmentsAndReports" id="Organization_Members_Table['.$value["ID"].'].AssessmentsAndReports" name="Organization_Members_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                          <option value="0">None</option>
                          <option selected="selected" value="1">View</option>
                          <option value="2">Modify</option>
                        </select>';
                } else {
                  echo '<select disabled class="AssessmentsAndReports" id="Organization_Members_Table['.$value["ID"].'].AssessmentsAndReports" name="Organization_Members_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                          <option selected="selected" value="0">None</option>
                          <option value="1">View</option>
                          <option value="2">Modify</option>
                        </select>';
                }
              } else {
                if ($value["AssessmentsAndReports"] == 2) {
                  echo '<select class="AssessmentsAndReports" id="Organization_Members_Table['.$value["ID"].'].AssessmentsAndReports" name="Organization_Members_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                          <option value="0">None</option>
                          <option value="1">View</option>
                          <option selected="selected" value="2">Modify</option>
                        </select>';
                } else if ($value["AssessmentsAndReports"] == 1) {
                  echo '<select class="AssessmentsAndReports" id="Organization_Members_Table['.$value["ID"].'].AssessmentsAndReports" name="Organization_Members_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                          <option value="0">None</option>
                          <option selected="selected" value="1">View</option>
                          <option value="2">Modify</option>
                        </select>';
                } else {
                  echo '<select class="AssessmentsAndReports" id="Organization_Members_Table['.$value["ID"].'].AssessmentsAndReports" name="Organization_Members_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                          <option selected="selected" value="0">None</option>
                          <option value="1">View</option>
                          <option value="2">Modify</option>
                        </select>';
                }
              }
            echo '</td>';
            echo '<td>';
              if ($value["Files"] == 2) {
                echo '<select class="Files" id="Organization_Members_Table['.$value["ID"].'].Files" name="Organization_Members_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["Files"] == 1) {
                echo '<select class="Files" id="Organization_Members_Table['.$value["ID"].'].Files" name="Organization_Members_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Files" id="Organization_Members_Table['.$value["ID"].'].Files" name="Organization_Members_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td style="display: none;">';
              if ($value["Analytics"] == 2) {
                echo '<select class="Analytics" id="Organization_Members_Table['.$value["ID"].'].Analytics" name="Organization_Members_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["Analytics"] == 1) {
                echo '<select class="Analytics" id="Organization_Members_Table['.$value["ID"].'].Analytics" name="Organization_Members_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Analytics" id="Organization_Members_Table['.$value["ID"].'].Analytics" name="Organization_Members_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>

  <?php
  if (sizeof($Supporter) > 50) {
    echo '<div id="WebABLLS_Support_Pager" class="WebABLLS_Support_Pager app-nopadding-nomargin hide">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }
  ?>
  
  <table id="WebABLLS_Support_Table" name="WebABLLS_Support_Table" class="tablesorter hide" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Organization Name</th>
        <th>Owner Rights</th>
        <th>Full Access</th>
        <th>Basic info</th>
        <th>Assessments and Reports</th>
        <th>Files</th>
        <th style="display: none;">Analytics</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($Supporter as $value) {
          echo '<tr>';
            echo '<td>';
              echo $value["FirstName"];
            echo '</td>';
            echo '<td>';
              echo $value["LastName"];
            echo '</td>';
            echo '<td>';
              echo $value["OrgName"];
            echo '</td>';
            echo '<td>';
              if ($value["OwnerRights"] == 1) {
                echo '<input type="checkbox" class="OwnerRights" name="WebABLLS_Support_Table['.$value["ID"].'][OwnerRights]" id="WebABLLS_Support_Table['.$value["ID"].'].OwnerRights" value="1" checked="checked"/>';
              } else {
                echo '<input type="checkbox" class="OwnerRights" name="WebABLLS_Support_Table['.$value["ID"].'][OwnerRights]" id="WebABLLS_Support_Table['.$value["ID"].'].OwnerRights" value="0"/>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["FullAccess"] == 2) {
                echo '<select class="FullAccess" id="WebABLLS_Support_Table['.$value["ID"].'].FullAccess" name="WebABLLS_Support_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">FA</option>
                        <option selected="selected" value="2">FA w. Share</option>
                      </select>';
              } else if ($value["FullAccess"] == 1) {
                echo '<select class="FullAccess" id="WebABLLS_Support_Table['.$value["ID"].'].FullAccess" name="WebABLLS_Support_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              } else {
                echo '<select class="FullAccess" id="WebABLLS_Support_Table['.$value["ID"].'].FullAccess" name="WebABLLS_Support_Table['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["BasicInfo"] == 2) {
                echo '<select class="BasicInfo" id="WebABLLS_Support_Table['.$value["ID"].'].BasicInfo" name="WebABLLS_Support_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["BasicInfo"] == 1) {
                echo '<select class="BasicInfo" id="WebABLLS_Support_Table['.$value["ID"].'].BasicInfo" name="WebABLLS_Support_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="BasicInfo" id="WebABLLS_Support_Table['.$value["ID"].'].BasicInfo" name="WebABLLS_Support_Table['.$value["ID"].'][BasicInfo]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["AssessmentsAndReports"] == 2) {
                echo '<select class="AssessmentsAndReports" id="WebABLLS_Support_Table['.$value["ID"].'].AssessmentsAndReports" name="WebABLLS_Support_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["AssessmentsAndReports"] == 1) {
                echo '<select class="AssessmentsAndReports" id="WebABLLS_Support_Table['.$value["ID"].'].AssessmentsAndReports" name="WebABLLS_Support_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="AssessmentsAndReports" id="WebABLLS_Support_Table['.$value["ID"].'].AssessmentsAndReports" name="WebABLLS_Support_Table['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($value["Files"] == 2) {
                echo '<select class="Files" id="WebABLLS_Support_Table['.$value["ID"].'].Files" name="WebABLLS_Support_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["Files"] == 1) {
                echo '<select class="Files" id="WebABLLS_Support_Table['.$value["ID"].'].Files" name="WebABLLS_Support_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Files" id="WebABLLS_Support_Table['.$value["ID"].'].Files" name="WebABLLS_Support_Table['.$value["ID"].'][Files]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td style="display: none;">';
              if ($value["Analytics"] == 2) {
                echo '<select class="Analytics" id="WebABLLS_Support_Table['.$value["ID"].'].Analytics" name="WebABLLS_Support_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["Analytics"] == 1) {
                echo '<select class="Analytics" id="WebABLLS_Support_Table['.$value["ID"].'].Analytics" name="WebABLLS_Support_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Analytics" id="WebABLLS_Support_Table['.$value["ID"].'].Analytics" name="WebABLLS_Support_Table['.$value["ID"].'][Analytics]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>

  <input style="display: none;" name="target" id="target" type="text" value="Organization_Members_Table"/>
</form>