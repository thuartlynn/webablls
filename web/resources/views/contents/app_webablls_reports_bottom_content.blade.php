<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Report Type Filter</span>
    <ul id="reportFilter" class="nav app-left-pan-list-mr-pd">
      
      <li class=""><input class="mr-1" type="checkbox" id="programWork" />Program Worksheet</li>
      <li class="nav-item"><input class="mr-1" type="checkbox" id="progress" />Progress</li>
      <li class="nav-item"><input class="mr-1" type="checkbox" id="sTatus" />Status</li>
      <li class="nav-item"><input class="mr-1" type="checkbox" id="bAseline" />Baseline</li>
      <input class="search hide" id="P_hide" type="search" value="" data-column="5"/>
    </ul>
</div>

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student Filter</span>
  <p class="ml-4 mt-2 mr-2">Name or ID: <input class="search" type="search" data-column="3-4"/></p>
</div>

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Assessment Color Filter</span><br>
  <div class="ml-2" style="">
  <?php
    $usingColor = array(0=> "#26baa2",
                        1=> "#8413A1",
                        2=> "#FAF411",
                        3=> "#FF8200");
    
  ?>

    <button id="reset" class="btn btn-sm btn-outline-secondary mr-2" >Show all colors</button>

    <div id="Color_Test" class="mt-1 ml-2 form-inline float-left">
      <?php 
        foreach ($usingColor as $value) {
          echo '<div data-color="'.$value.'" class="mark-bigger1 mr-2" style="background-color:'.$value.';" onclick="add_white(this)"></div>';
        }
      ?>
      <input class="search hide" id="color_hide" type="search" data-column="0" autocomplete="off" />
    </div>
  </div>
</div>

<div class="" style="margin-top: 5px;">
  <?php
    $report = array(0=>array("Modify" => "M", "Type" => "Worksheet", "Student_ID" => 438, "Student_Name" => "Partingtion, Aiden", "ID" => 3, "Color" => "#26baa2", "Assigned_Date" => "02/25/2020", "Created_Date" => "02/25/2020", "Creator" => "Kolby,Collins", "ProgressReport" => array( 0 => array("Modify" => "M", "Type" => "Progress", "ID" => 3, "Assigned_Date" => "02/25/2020", "Created_Date" => "02/25/2020", "Creator" => "Kolby,Collins"))),
                    1=>array("Modify" => "M", "Type" => "BaseLine", "Student_ID" => 438, "Student_Name" => "Partingtion, Aiden", "ID" => 37, "Color" => "#8413A1", "Assigned_Date" => "02/24/2020", "Created_Date" => "02/24/2020", "Creator" => "Kolby,Collins"),
                    2=>array("Modify" => "V", "Type" => "Worksheet", "Student_ID" => 578, "Student_Name" => "Green, Molly", "ID" => 43, "Color" => "#FAF411", "Assigned_Date" => "02/23/2020", "Created_Date" => "02/23/2020", "Creator" => "Kolby,Collins"),
                    3=>array("Modify" => "V", "Type" => "Worksheet", "Student_ID" => 578, "Student_Name" => "Green, Molly", "ID" => 42, "Color" => "#FAF411", "Assigned_Date" => "02/23/2020", "Created_Date" => "02/23/2020", "Creator" => "Kolby,Collins"),
                    4=>array("Modify" => "V", "Type" => "Worksheet", "Student_ID" => 578, "Student_Name" => "Green, Molly", "ID" => 41, "Color" => "#FAF411", "Assigned_Date" => "02/23/2020", "Created_Date" => "02/23/2020", "Creator" => "Kolby,Collins"),
                    5=>array("Modify" => "M", "Type" => "Worksheet", "Student_ID" => 438, "Student_Name" => "Partingtion, Aiden", "ID" => 4, "Color" => "#FAF411", "Assigned_Date" => "02/23/2020", "Created_Date" => "02/23/2020", "Creator" => "Kolby,Collins", "ProgressReport" => array( 0 => array("Modify" => "M", "Type" => "Progress", "ID" => 4, "Assigned_Date" => "02/25/2020", "Created_Date" => "02/24/2020", "Creator" => "Kolby,Collins")))
    );
  ?>
  <?php
    if (sizeof($report) > 50) {
      echo '<div id="pager" class="pager app-nopadding-nomargin">
              <div style="float: left;" class="prev pager-button"><< previous page</div>
              <div style="float: right;" class="next pager-button">next page >></div>
            </div>';
    }
  ?>
  <table id="ReportTable" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th class="hide">color數值</th>
        <th></th>
        <th>Modify</th>
        <th>Student ID</th>
        <th>Student</th>
        <th>Type</th>
        <th>Assigned Date</th>
        <th>Created at</th>
        <th>Create by</th>
      </tr>
    </thead>
    <tbody>
    <?php
      $url_profile = url('/Student/ViewProfile/');
      $url_summary = url('/Student/ViewSummary/');
        foreach ($report as $test1){
          echo '<tr data-table-row-id="'.$test1["Type"].'/'.$test1["ID"].'">';
          if (isset($test1["Color"]) != null) {
            echo '<td class="hide">'.$test1["Color"].'</td>';
          } else { echo '<td></td>'; }
          echo '<td>';
                if (isset($test1["Color"]) != null) {
                  echo '<div id="assessReportcolor"  class="'.$test1["Color"].'" style="background-color:'.$test1["Color"].';"></div>';
                }
          echo '</td>';
          echo '<td>'.$test1["Modify"].'</td>';
          echo '<td><a href='.$url_profile.'/'.$test1["Student_ID"].'>'.$test1["Student_ID"].'</a></td>';
          echo '<td><a href='.$url_summary.'/'.$test1["Student_ID"].'>'.$test1["Student_Name"].'</a></td>';
          echo '<td>'.$test1["Type"].'</td>';
          echo '<td>'.$test1["Assigned_Date"].'</td>';
          echo '<td>'.$test1["Created_Date"].'</td>';
          echo '<td>'.$test1["Creator"].'</td>';
          echo '</tr>';
        }
    ?>
    <?php
      foreach ($test1["ProgressReport"] as $pr) {
              echo '<tr data-table-row-id="'.$pr["ID"].'">';
              if (isset($test1["Color"]) != null) {
                echo '<td class="hide">'.$test1["Color"].'</td>';
              } else { echo '<td></td>'; }              
              echo '<td><div id="assessReportcolor" style="background-color:'.$test1["Color"].';"></div></td>';
              echo '<td>'.$pr["Modify"].'</td>';
              echo '<td><a href="{{url(\'/Student/profile/'.$test1["Student_ID"].'\')}}">'.$test1["Student_ID"].'</a></td>';
              echo '<td><a href="{{url(\'/Student/ViewSummary/'.$test1["Student_ID"].'\')}}">'.$test1["Student_Name"].'</a></td>';
              echo '<td>'.$pr["Type"].'</td>';
              echo '<td>'.$pr["Assigned_Date"].'</td>';
              echo '<td>'.$pr["Created_Date"].'</td>';
              echo '<td>'.$pr["Creator"].'</td>';
              echo '</tr>'; 
            }
    ?>
    </tbody>
  </table>
</div>

