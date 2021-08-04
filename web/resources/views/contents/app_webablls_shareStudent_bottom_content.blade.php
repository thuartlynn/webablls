<?php
  use App\Enums\UserRole;
?>

<!-- <div class="app-left-pan" style="margin-top: 5px;">
    <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Add Contact</span>
    <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
      <ul class="navbar-nav app-left-pan-list-mr-pd">
      <?php
        $Id = $Student->get("ID");
        $Url = url('Student/Add Contact');
        echo '<form action="'.$Url.'/ + '.$Id.'" class="form-inline needs-validation" method="post" role="form">';
      ?>
      {{ csrf_field() }}
        <div>
          <p class="app-left-pan-first-p list-inline-item">Contact Email:</p>
          <input value="" class="form-control app-left-pan-input app-option-font list-inline-item" name="ContactEmail" id="ContactEmail" type="text"/>
          <button class="btn tis-btn-xs btn-secondary" onclick="AddContact()" type="button">Add Contact</button>
          <p id="addcontact_error" class="ml-1 list-inline-item text-danger hide">Enter email address.</p>
          <p id="addcontact_success" class="ml-1 list-inline-item text-success hide">Contact added. <a href="" onclick="window.location.reload();">Reload page</a> to see it on list of contacts.</p>
        </div>
      </form>
      </ul>
    </nav>
</div> -->

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Own Sharing Rights</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Own Sharing Rights</span>';
  }
?>

    <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
      <ul class="navbar-nav app-left-pan-list-mr-pd">
        <div>
          <?php
            $User = Auth::user()["user_id"];

            foreach($Author as $Authorvalue) {
              if ($Authorvalue["ID"] === $User) {
                if ($Authorvalue["Coordinator"] === 1) {
                    echo '<span class="app-table-span-with-background-color poptext">CO</span><span>You are the Coordinator of this student.</span><br>';}
                if ($Authorvalue["OwnerRights"] === 1){
                    echo '<span class="app-table-span-with-background-color poptext">O</span><span>You are the Owner of this student.</span><br>';}
                if ($Authorvalue["FullAccess"] === 2){
                    echo '<span class="app-table-span-with-background-color poptext">FAs</span><span>You have Full Access rights to this student with sharing rights.</span><br>';}
              } else {
                echo '';
              }
            }

          ?>
        </div>
      </ul>
    </nav>
  </div>

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
      <ul class="navbar-nav app-left-pan-list-mr-pd">
        <p>Name : <input type="search" class="search" data-column="0"/></p>
      </ul>
    </nav>
</div>

<!-- <div class="app-select-list" style="margin-top: 10px;">
    <span data-index="Personal_Contacts" class="select">Personal Contacts</span>
    <span data-index="Organization_Members" class="no-select">Organization Members</span>
    <span data-index="WebABLLS_Support" class="no-select">WebABLLS Support</span>
</div> -->

<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr hide">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Share Permissions have been updated.</span>  
  </div>
</div>

<!-- <form action="{{url('/Student/addstudent')}}" class="app-inline" id="Studentsuserlinksfrm" method="post" role="form" novalidate> -->
<form action="{{url('/Student/ShareStudent')}}/<?php echo $Student["ID"]?>" class="app-inline" id="Studentsuserlinksfrm" method="post" role="form" novalidate>{{ csrf_field() }}
<!-- <form action="{{url('/Organization/Students/UserLinks')}}/<?php echo $Student["ID"]?>" class="app-inline" id="Studentsuserlinksfrm" method="post" role="form" novalidate>{{ csrf_field() }} -->
<!-- Personal Contacts -->
  <?php 
  // if (sizeof($Contact) > 10) {
  //   echo '<div id="Personal_Contacts_Pager" class="Personal_Contacts_Pager app-nopadding-nomargin hide">
  //           <div style="float: left;" class="prev pager-button"><< previous page</div>
  //           <div style="float: right;" class="next pager-button">next page >></div>
  //         </div>';
  // }
  ?>
  
  <!-- <table id="Personal_Contacts_Table" name="Personal_Contacts_Table" class="tablesorter" style="margin-bottom: 0 !important;">
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
      </tr>
    </thead>

    <tbody>
      <?php
        $count = 0;
        foreach($Contact as $Contact) {
          echo '<tr>';
            echo '<td>';
              echo $Contact["FirstName"];
            echo '</td>';
            echo '<td>';
              echo $Contact["LastName"];
            echo '</td>';
            echo '<td>';
              echo $Contact["OrgName"];
            echo '</td>';
            echo '<td>';
              if ($Contact["OwnerRights"] == 1) {
                echo '<input type="checkbox" class="OwnerRights" name="Personal_Contacts_Table['.$count.'].OwnerRights" id="Personal_Contacts_Table['.$count.'].OwnerRights" value="1" checked="checked"/>';
              } else {
                echo '<input type="checkbox" class="OwnerRights" name="Personal_Contacts_Table['.$count.'].OwnerRights" id="Personal_Contacts_Table['.$count.'].OwnerRights" value="0"/>';
              }
            echo '</td>';
            echo '<td>';
              if ($Contact["FullAccess"] == 2) {
                echo '<select class="FullAccess" id="Personal_Contacts_Table['.$count.'].FullAccess" name="Personal_Contacts_Table['.$count.'].FullAccess" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">FA</option>
                        <option selected="selected" value="2">FA w. Share</option>
                      </select>';
              } else if ($Contact["FullAccess"] == 1) {
                echo '<select class="FullAccess" id="Personal_Contacts_Table['.$count.'].FullAccess" name="Personal_Contacts_Table['.$count.'].FullAccess" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              } else {
                echo '<select class="FullAccess" id="Personal_Contacts_Table['.$count.'].FullAccess" name="Personal_Contacts_Table['.$count.'].FullAccess" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($Contact["BasicInfo"] == 2) {
                echo '<select class="BasicInfo" id="Personal_Contacts_Table['.$count.'].BasicInfo" name="Personal_Contacts_Table['.$count.'].BasicInfo" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($Contact["BasicInfo"] == 1) {
                echo '<select class="BasicInfo" id="Personal_Contacts_Table['.$count.'].BasicInfo" name="Personal_Contacts_Table['.$count.'].BasicInfo" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="BasicInfo" id="Personal_Contacts_Table['.$count.'].BasicInfo" name="Personal_Contacts_Table['.$count.'].BasicInfo" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($Contact["AssessmentsAndReports"] == 2) {
                echo '<select class="AssessmentsAndReports" id="Personal_Contacts_Table['.$count.'].AssessmentsAndReports" name="Personal_Contacts_Table['.$count.'].AssessmentsAndReports" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($Contact["AssessmentsAndReports"] == 1) {
                echo '<select class="AssessmentsAndReports" id="Personal_Contacts_Table['.$count.'].AssessmentsAndReports" name="Personal_Contacts_Table['.$count.'].AssessmentsAndReports" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="AssessmentsAndReports" id="Personal_Contacts_Table['.$count.'].AssessmentsAndReports" name="Personal_Contacts_Table['.$count.'].AssessmentsAndReports" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($Contact["Files"] == 2) {
                echo '<select class="Files" id="Personal_Contacts_Table['.$count.'].Files" name="Personal_Contacts_Table['.$count.'].Files" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($Contact["Files"] == 1) {
                echo '<select class="Files" id="Personal_Contacts_Table['.$count.'].Files" name="Personal_Contacts_Table['.$count.'].Files" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Files" id="Personal_Contacts_Table['.$count.'].Files" name="Personal_Contacts_Table['.$count.'].Files" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
          echo '</tr>';
          $count++;
        }
      ?>
    </tbody>
  </table> -->
<!-- Organization Members -->
  <?php
  if ($OrgMember->count() > 50) {
    echo '<div class="pager app-nopadding-nomargin">
            <div style="float: left;" class="prev pager-button"><< previous page</div>
            <div style="float: right;" class="next pager-button">next page >></div>
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
            if (Auth::user()->role == 0 ) {
              echo '<input type="checkbox" class="OwnerRights" disabled>';
            } else if (Auth::user()->role == 0 && $value["OwnerRights"] == 1) {
              echo '<input type="checkbox" class="OwnerRights" checked="checked" disabled>';
            } else {
              if ($value["OwnerRights"] == 1) {
                echo '<input type="checkbox" class="OwnerRights" name="Organization_Members_Table['.$value["ID"].'][OwnerRights]" id="Organization_Members_Table['.$value["ID"].'].OwnerRights" value="1" checked="checked"/>';
              } else {
                echo '<input type="checkbox" class="OwnerRights" name="Organization_Members_Table['.$value["ID"].'][OwnerRights]" id="Organization_Members_Table['.$value["ID"].'].OwnerRights" value="0"/>';
              }
            }
            echo '</td>';
            echo '<td>';
              if (Auth::user()->role == 0) {
                echo '<select disabled>
                        <option value="0">None</option></select>';
              } else if (Auth::user()->role == 0 && $value["OwnerRights"] == 1) {
                echo '<select disabled>
                        <option value="0">None</option></select>';
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
              if (Auth::user()->role == 0) {
                echo '<select disabled>
                        <option value="0">None</option></select>';
              } else if (Auth::user()->role == 0 && $value["OwnerRights"] == 1) {
                echo '<select disabled>
                        <option value="0">None</option></select>';
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
          echo '</tr>';
        }
    ?>
    </tbody>
  </table>
<!-- WebABLLS Support -->
<?php
  // if (sizeof($Supporter) > 10) {
  //   echo '<div id="WebABLLS_Support_Pager" class="WebABLLS_Support_Pager app-nopadding-nomargin hide">
  //           <div style="float: left;" class="prev pager-button"><< previous page</div>
  //           <div style="float: right;" class="next pager-button">next page >></div>
  //         </div>';
  // }
?>
  
  <!-- <table id="WebABLLS_Support_Table" name="WebABLLS_Support_Table" class="tablesorter hide" style="margin-bottom: 0 !important;">
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
      </tr>
    </thead>

    <tbody>
      <?php
        $count = 0;
        foreach($Supporter as $Supporter) {

          if ($Supporter === ""){
            echo '<p>There is no data.</p>';
          } else {
          echo '<tr>';
            echo '<td>';
              echo $Supporter["FirstName"];
            echo '</td>';
            echo '<td>';
              echo $Supporter["LastName"];
            echo '</td>';
            echo '<td>';
              echo $Supporter["OrgName"];
            echo '</td>';
            echo '<td>';
              if ($Supporter["OwnerRights"] == 1) {
                echo '<input type="checkbox" class="OwnerRights" name="WebABLLS_Support_Table['.$count.'].OwnerRights" id="WebABLLS_Support_Table['.$count.'].OwnerRights" value="1" checked="checked"/>';
              } else {
                echo '<input type="checkbox" class="OwnerRights" name="WebABLLS_Support_Table['.$count.'].OwnerRights" id="WebABLLS_Support_Table['.$count.'].OwnerRights" value="0"/>';
              }
            echo '</td>';
            echo '<td>';
              if ($Supporter["FullAccess"] == 2) {
                echo '<select class="FullAccess" id="WebABLLS_Support_Table['.$count.'].FullAccess" name="WebABLLS_Support_Table['.$count.'].FullAccess" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">FA</option>
                        <option selected="selected" value="2">FA w. Share</option>
                      </select>';
              } else if ($Supporter["FullAccess"] == 1) {
                echo '<select class="FullAccess" id="WebABLLS_Support_Table['.$count.'].FullAccess" name="WebABLLS_Support_Table['.$count.'].FullAccess" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              } else {
                echo '<select class="FullAccess" id="WebABLLS_Support_Table['.$count.'].FullAccess" name="WebABLLS_Support_Table['.$count.'].FullAccess" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($Supporter["BasicInfo"] == 2) {
                echo '<select class="BasicInfo" id="WebABLLS_Support_Table['.$count.'].BasicInfo" name="WebABLLS_Support_Table['.$count.'].BasicInfo" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($Supporter["BasicInfo"] == 1) {
                echo '<select class="BasicInfo" id="WebABLLS_Support_Table['.$count.'].BasicInfo" name="WebABLLS_Support_Table['.$count.'].BasicInfo" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="BasicInfo" id="WebABLLS_Support_Table['.$count.'].BasicInfo" name="WebABLLS_Support_Table['.$count.'].BasicInfo" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($Supporter["AssessmentsAndReports"] == 2) {
                echo '<select class="AssessmentsAndReports" id="WebABLLS_Support_Table['.$count.'].AssessmentsAndReports" name="WebABLLS_Support_Table['.$count.'].AssessmentsAndReports" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($Supporter["AssessmentsAndReports"] == 1) {
                echo '<select class="AssessmentsAndReports" id="WebABLLS_Support_Table['.$count.'].AssessmentsAndReports" name="WebABLLS_Support_Table['.$count.'].AssessmentsAndReports" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="AssessmentsAndReports" id="WebABLLS_Support_Table['.$count.'].AssessmentsAndReports" name="WebABLLS_Support_Table['.$count.'].AssessmentsAndReports" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
            echo '<td>';
              if ($Supporter["Files"] == 2) {
                echo '<select class="Files" id="WebABLLS_Support_Table['.$count.'].Files" name="WebABLLS_Support_Table['.$count.'].Files" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($Supporter["Files"] == 1) {
                echo '<select class="Files" id="WebABLLS_Support_Table['.$count.'].Files" name="WebABLLS_Support_Table['.$count.'].Files" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="Files" id="WebABLLS_Support_Table['.$count.'].Files" name="WebABLLS_Support_Table['.$count.'].Files" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            echo '</td>';
          echo '</tr>';
          }
          $count++;
        }
      ?>
    </tbody>
  </table> -->
  <input style="display: none;" name="target" id="target" type="text" value="Organization_Members_Table"/>

</form>