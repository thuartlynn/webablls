<?php
  use App\Enums\UserRole;
?>

<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr hide">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Share Permissions have been updated.</span>  
  </div>
</div>

<form action="{{url('/Organization/UserLinks')}}/{{$User->get('ID')}}" class="app-inline" id="userlinksfrm" method="post" role="form" novalidate>
  {{ csrf_field() }}
  <?php
    if (sizeof($Seat) > 50) {
      echo '<div id="pager" class="pager app-nopadding-nomargin margin-bottom: -10px;">
              <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
              <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
            </div>';
    }
  
    if (sizeof($Seat) > 0) {
      echo '<table id="UserTable" class="tablesorter" style="margin-bottom: 0 !important;">
              <thead>
                <tr>
                  <th>ID#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Owner Rights</th>
                  <th>Full Access</th>
                  <th>Basic info</th>
                  <th>Assessments and Reports</th>
                  <th>Files</th>
                  <th style="display: none;">Analytics</th>
                </tr>
              </thead>
            <tbody>';
      $count = 0;
      foreach($Seat  as $value) {
        echo '<tr>';
          echo '<td>';
            echo $value["ID"];
          echo '</td>';
          echo '<td>';
            echo $value["FirstName"];
          echo '</td>';
          echo '<td>';
            echo $value["LastName"];
          echo '</td>';
          echo '<td>';
            if ($User->get('Role') == "UserRole::Restricted()") {
              if ($value["OwnerRights"] == 1) {
                echo '<input disabled type="checkbox" class="OwnerRights" name="SP['.$value["ID"].'][OwnerRights]" id="SP['.$value["ID"].'][OwnerRights]" value="1" checked="checked"/>';
              } else {
                echo '<input disabled type="checkbox" class="OwnerRights" name="SP['.$value["ID"].'][OwnerRights]" id="SP['.$value["ID"].'][OwnerRights]" value="0"/>';
              }
            } else {
              if ($value["OwnerRights"] == 1) {
                echo '<input type="checkbox" class="OwnerRights" name="SP['.$value["ID"].'][OwnerRights]" id="SP['.$value["ID"].'][OwnerRights]" value="1" checked="checked"/>';
              } else {
                echo '<input type="checkbox" class="OwnerRights" name="SP['.$value["ID"].'][OwnerRights]" id="SP['.$value["ID"].'][OwnerRights]" value="0"/>';
              }
            }
          echo '</td>';
          echo '<td>';
            if ($User->get('Role') == "UserRole::Restricted()") {
              if ($value["FullAccess"] == 2) {
                echo '<select disabled class="FullAccess" id="SP['.$value["ID"].'][FullAccess]" name="SP['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">FA</option>
                        <option selected="selected" value="2">FA w. Share</option>
                      </select>';
              } else if ($value["FullAccess"] == 1) {
                echo '<select disabled class="FullAccess" id="SP['.$value["ID"].'][FullAccess]" name="SP['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              } else {
                echo '<select disabled class="FullAccess" id="SP['.$value["ID"].'][FullAccess]" name="SP['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              }
            } else {
              if ($value["FullAccess"] == 2) {
                echo '<select class="FullAccess" id="SP['.$value["ID"].'][FullAccess]" name="SP['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">FA</option>
                        <option selected="selected" value="2">FA w. Share</option>
                      </select>';
              } else if ($value["FullAccess"] == 1) {
                echo '<select class="FullAccess" id="SP['.$value["ID"].'][FullAccess]" name="SP['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              } else {
                echo '<select class="FullAccess" id="SP['.$value["ID"].'][FullAccess]" name="SP['.$value["ID"].'][FullAccess]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">FA</option>
                        <option value="2">FA w. Share</option>
                      </select>';
              }
            }
          echo '</td>';
          echo '<td>';
            if ($value["BasicInfo"] == 2) {
              echo '<select class="BasicInfo" id="SP['.$value["ID"].'][BasicInfo]" name="SP['.$value["ID"].'][BasicInfo]" style="width: auto;">
                      <option value="0">None</option>
                      <option value="1">View</option>
                      <option selected="selected" value="2">Modify</option>
                    </select>';
            } else if ($value["BasicInfo"] == 1) {
              echo '<select class="BasicInfo" id="SP['.$value["ID"].'][BasicInfo]" name="SP['.$value["ID"].'][BasicInfo]" style="width: auto;">
                      <option value="0">None</option>
                      <option selected="selected" value="1">View</option>
                      <option value="2">Modify</option>
                    </select>';
            } else {
              echo '<select class="BasicInfo" id="SP['.$value["ID"].'][BasicInfo]" name="SP['.$value["ID"].'][BasicInfo]" style="width: auto;">
                      <option selected="selected" value="0">None</option>
                      <option value="1">View</option>
                      <option value="2">Modify</option>
                    </select>';
            }
          echo '</td>';
          echo '<td>';
            if ($User->get('Role') == "UserRole::Restricted()") {
              if ($value["AssessmentsAndReports"] == 2) {
                echo '<select disabled ="AssessmentsAndReports" id="SP['.$value["ID"].'][AssessmentsAndReports]" name="SP['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["AssessmentsAndReports"] == 1) {
                echo '<select disabled ="AssessmentsAndReports" id="SP['.$value["ID"].'][AssessmentsAndReports]" name="SP['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select disabled class="AssessmentsAndReports" id="SP['.$value["ID"].'][AssessmentsAndReports]" name="SP['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            } else {
              if ($value["AssessmentsAndReports"] == 2) {
                echo '<select class="AssessmentsAndReports" id="SP['.$value["ID"].'][AssessmentsAndReports]" name="SP['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option value="1">View</option>
                        <option selected="selected" value="2">Modify</option>
                      </select>';
              } else if ($value["AssessmentsAndReports"] == 1) {
                echo '<select class="AssessmentsAndReports" id="SP['.$value["ID"].'][AssessmentsAndReports]" name="SP['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option value="0">None</option>
                        <option selected="selected" value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              } else {
                echo '<select class="AssessmentsAndReports" id="SP['.$value["ID"].'][AssessmentsAndReports]" name="SP['.$value["ID"].'][AssessmentsAndReports]" style="width: auto;">
                        <option selected="selected" value="0">None</option>
                        <option value="1">View</option>
                        <option value="2">Modify</option>
                      </select>';
              }
            }
          echo '</td>';
          echo '<td>';
            if ($value["Files"] == 2) {
              echo '<select class="Files" id="SP['.$value["ID"].'][Files]" name="SP['.$value["ID"].'][Files]" style="width: auto;">
                      <option value="0">None</option>
                      <option value="1">View</option>
                      <option selected="selected" value="2">Modify</option>
                    </select>';
            } else if ($value["Files"] == 1) {
              echo '<select class="Files" id="SP['.$value["ID"].'][Files]" name="SP['.$value["ID"].'][Files]" style="width: auto;">
                      <option value="0">None</option>
                      <option selected="selected" value="1">View</option>
                      <option value="2">Modify</option>
                    </select>';
            } else {
              echo '<select class="Files" id="SP['.$value["ID"].'][Files]" name="SP['.$value["ID"].'][Files]" style="width: auto;">
                      <option selected="selected" value="0">None</option>
                      <option value="1">View</option>
                      <option value="2">Modify</option>
                    </select>';
            }
          echo '</td>';
          echo '<td style="display: none;">';
            if ($value["Analytics"] == 2) {
              echo '<select class="Analytics" id="SP['.$value["ID"].'][Analytics]" name="SP['.$value["ID"].'][Analytics]" style="width: auto;">
                      <option value="0">None</option>
                      <option value="1">View</option>
                      <option selected="selected" value="2">Modify</option>
                    </select>';
            } else if ($value["Analytics"] == 1) {
              echo '<select class="Analytics" id="SP['.$value["ID"].'][Analytics]" name="SP['.$value["ID"].'][Analytics]" style="width: auto;">
                      <option value="0">None</option>
                      <option selected="selected" value="1">View</option>
                      <option value="2">Modify</option>
                    </select>';
            } else {
              echo '<select class="Analytics" id="SP['.$value["ID"].'][Analytics]" name="SP['.$value["ID"].'][Analytics]" style="width: auto;">
                      <option selected="selected" value="0">None</option>
                      <option value="1">View</option>
                      <option value="2">Modify</option>
                    </select>';
            }
          echo '</td>';
        echo '</tr>';
        $count++;
      }
      echo '</tbody>
            </table>
            <button id="Save" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="save()" type="button">Set Share Permissions</button>';
      } else {
        echo '<p class="app-right-bottom-content">There is no data to show.</p>';
        echo '<button id="Save" style="display:none;" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="save()" type="button">Set Share Permissions</button>';
      }
  ?>
</form>