<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Assessment Filter</span>';
  } else {
    echo '<div class="app-left-pan">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Assessment Filter</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <div class="app-left-pan-list-mr-pd">
      <div style="margin-top: 10px;">
        <div>
          <label style="display: inline-block;" class="mr-2" for="Show_all_assessments"><span class="mr-1" style="vertical-align: middle;">Show all assessments</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_all_assessments" name="Show_all_assessments" /></label>
          <label style="display: inline-block;" class="mr-2" for="Show_last"><span class="mr-1" style="vertical-align: middle;">Show only last assessment</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_last" name="Show_last" /></label>
          <label style="display: inline-block;" for="Show_first"><span class="mr-1" style="vertical-align: middle;">Show only first assessment</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_first" name="Show_first" /></label>
        </div>

        <div>
          <label style="display: inline-block;" class="mr-2" for="Show_all_assessments_range"><span class="mr-1" style="vertical-align: middle;">Show all assessments</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_all_assessments_range" name="Show_all_assessments_range" /></label>
          <label style="display: inline-block;" class="mr-2" for="Show_last_3_months"><span class="mr-1" style="vertical-align: middle;">Last 3 months</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_last_3_months" name="Show_last_3_months" /></label>
          <label style="display: inline-block;" class="mr-2" for="Show_last_6_months"><span class="mr-1" style="vertical-align: middle;">Last 6 months</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_last_6_months" name="Show_last_6_months" /></label>
          <label style="display: inline-block;" class="mr-2" for="Show_last_year"><span class="mr-1" style="vertical-align: middle;">Last year</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_last_year" name="Show_last_year" /></label>
          <label style="display: inline-block;" class="mr-2" for="Show_last_2_years"><span class="mr-1" style="vertical-align: middle;">Last 2 years</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_last_2_years" name="Show_last_2_years" /></label>
          <label style="display: inline-block;" class="mr-2" for="Show_last_5_years"><span class="mr-1" style="vertical-align: middle;">Last 5 years</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_last_5_years" name="Show_last_5_years" /></label>
          <label style="display: inline-block;" for="Show_more_than_5_years"><span class="mr-1" style="vertical-align: middle;">More than 5 years</span><input autocomplete="off" style="vertical-align: middle;" type="checkbox" id="Show_more_than_5_years" name="Show_more_than_5_years" /></label>
        </div>

        <p style="display: inline;" class="app-left-pan-first-p">Student Name or ID:</p>
        <input autocomplete="off" class="search form-control app-left-pan-input app-option-font" name="Name" id="Name" style="display: inline; margin-right: 20px;" type="search" value="" data-column="2-3" oninput="Change()"/>
        <p style="display: inline;" class="app-left-pan-first-p">Creator:</p>
        <input autocomplete="off" class="search form-control app-left-pan-input app-option-font" name="Creator" id="Creator" style="display: inline; margin-right: 20px;" type="search" value="" data-column="6" oninput="Change()"/>
        <p style="display: inline;" class="app-left-pan-first-p">Location:</p>
        <input autocomplete="off" class="search form-control app-left-pan-input app-option-font" name="Location" id="Location" style="display: inline;" type="search" value="" data-column="7" oninput="Change()"/>
        <input autocomplete="off" class="search" style="display: none;" id="show_last_or_first" type="search" value="" data-column="8"/>
        <input autocomplete="off" class="search" style="display: none;" id="show_range" type="search" value="" data-column="9"/>
      </div>
    </div>
  </nav>
</div>

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px; display: none;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Assessment Counter</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px; display: none;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Assessment Counter</span>';
  }
?>

  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <div class="navbar-nav app-left-pan-list-mr-pd">
      <div style="margin-top: 10px;">
          <p style="display: inline; margin-right: 20px;" class="app-left-pan-first-p">All assessments {{$Assessments->count()}}</p>
          <p style="display: inline;" class="app-left-pan-first-p">Visible assessments</p>
          <p id="Visible_Num" style="display: inline;" class="app-left-pan-first-p">{{$Assessments->count()}}</p>
      </div>
    </div>
  </nav>
</div>

<?php
if ($Assessments->count() > 50) {
  echo '<div id="Assessments_Pager" class="Assessments_Pager app-nopadding-nomargin">
          <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
          <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
        </div>';
}

if ($Assessments->count() > 0) {
  echo '<table id="Table" name="Assessments_Table" class="tablesorter" style="margin-bottom: 0 !important;">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th>ID#</th>
        <th>Student</th>
        <th>Assigned Date</th>
        <th>Create Date</th>
        <th>User</th>
        <th>Location</th>
        <th style="display: none;">Last or First</th>
        <th style="display: none;">Range</th>
      </tr>
    </thead>

    <tbody>';
  
  $url_profile = url('/Student/ViewProfile/');
  $url_summary = url('/Student/ViewSummary/');
  $temp = "";
  $count = 0;
  foreach($Assessments as $value) {
    $temp = str_replace("\"","",$value["Permission"]);
    $temp = str_replace("[","",$temp);
    $temp = str_replace("]","",$temp);
    echo '<tr data-table-row-id="'.$value["ID"].'" data-permission="'.$temp.'" data-table-row-seat-id="'.$value["Seat_ID"].'">';
      echo '<td>';
        echo '<span style="margin-right: 5px; background-color:'.$value["Color"].';" class="app-table-span-without-background-color">&nbsp;&nbsp;&nbsp;</span>';
      echo '</td>';
      echo '<td>';
        echo '<span class="app-table-span-with-background-color poptext">'.$value["Authority"].'</span>';
      echo '</td>';
      echo '<td>';
      echo '<span class="addcontent" id="ID_'.$count.'" data-index="View Profile" data-display="'.$value["Seat_ID"].'" data-path="'.$url_profile.'/'.$value["Seat_ID"].'"></span>';
      echo '</td>';

      echo '<td>';
      echo '<span class="addcontent" id="STUDENT_'.$count.'" data-index="View Summary" data-display="'.$value["Student"].'" data-path="'.$url_summary.'/'.$value["Seat_ID"].'"></span>';
      echo '</td>';
      echo '<td>';
        echo $value["Assigned_Date"];
      echo '</td>';
      echo '<td>';
        echo $value["Create_Date"];
      echo '</td>';
      echo '<td>';
        echo $value["User"];
      echo '</td>';
      echo '<td>';
        echo $value["Location"];
      echo '</td>';
      echo '<td style="display: none;">';
        echo $value["Assessment_Filter_Last_or_First"];
      echo '</td>';
      echo '<td style="display: none;">';
        echo $value["Assesement_Filter_Range"];
      echo '</td>';
    echo '</tr>';
    $count++;
  }
  echo '</tbody>
        </table>';
} else {
  echo '<p class="app-right-bottom-content">There is no data to show.</p>';
}
?>