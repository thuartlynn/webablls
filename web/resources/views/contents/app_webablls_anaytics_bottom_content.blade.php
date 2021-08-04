<?php
    $Table = array( 0=>array("Authority"=>"M", "ID"=>"1", "Student"=>"Test1", "Color"=>"#00bfff", "Assessment_Dates"=>"11/03/2019", "Assigned_Date"=>"11/04/2019", "Create_Date"=>"11/27/2019", "Created_By"=>"Test6", "Analysis_ID"=>"731", "Last_analyses"=>"1"),
                    1=>array("Authority"=>"M", "ID"=>"2", "Student"=>"Test2", "Color"=>"#0005ff", "Assessment_Dates"=>"11/03/2019", "Assigned_Date"=>"11/04/2019", "Create_Date"=>"11/27/2019", "Created_By"=>"Test7", "Analysis_ID"=>"732", "Last_analyses"=>"0"),
                    2=>array("Authority"=>"M", "ID"=>"3", "Student"=>"Test3", "Color"=>"#810581", "Assessment_Dates"=>"11/03/2019", "Assigned_Date"=>"11/04/2019", "Create_Date"=>"11/27/2019", "Created_By"=>"Test8", "Analysis_ID"=>"733", "Last_analyses"=>"1"),
                    3=>array("Authority"=>"M", "ID"=>"4", "Student"=>"Test4", "Color"=>"#817d05", "Assessment_Dates"=>"11/03/2019", "Assigned_Date"=>"11/04/2019", "Create_Date"=>"11/27/2019", "Created_By"=>"Test9", "Analysis_ID"=>"734", "Last_analyses"=>"0"),
                    4=>array("Authority"=>"M", "ID"=>"5", "Student"=>"Test5", "Color"=>"#097d05", "Assessment_Dates"=>"11/03/2019", "Assigned_Date"=>"11/04/2019", "Create_Date"=>"11/27/2019", "Created_By"=>"Test1", "Analysis_ID"=>"735", "Last_analyses"=>"1"));
?>

<div class="app-left-pan">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Analysis Filter</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <div class="app-left-pan-list-mr-pd">
      <div style="margin-top: 10px;">
        <div style="margin-bottom: 10px;"> 
          <label for="show_all" style="margin: 0; padding: 0;">
            <span>Show all analyses</span>
            <input autocomplete="off" name="org" id="show_all" type="radio" class="ml-1" checked="checked" style="margin-right: 20px; vertical-align: middle;"/>
          </label>
          <label for="show_last" style="margin: 0; padding: 0;">
            <span>Show only last analyses</span>
            <input autocomplete="off" name="org" id="show_last" type="radio" class="ml-1" style="vertical-align: middle;"/>
          </label>
          <input autocomplete="off" class="search" style="display: none;" id="show_hide" type="search" value="" data-column="8"/>
        </div>
        <p style="display: inline;" class="app-left-pan-first-p">Student Name or ID:</p>
        <input autocomplete="off" class="search form-control app-left-pan-input app-option-font" name="Name" id="Name" style="display: inline; margin-right: 20px;" type="search" value="" data-column="1-2" oninput="Change()"/>
        <p style="display: inline;" class="app-left-pan-first-p">Creator:</p>
        <input autocomplete="off" class="search form-control app-left-pan-input app-option-font" name="Creator" id="Creator" style="display: inline;" type="search" value="" data-column="6" oninput="Change()"/>
      </div>
    </div>
  </nav>
</div>

<div class="app-left-pan" style="margin-top: 5px;">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Analysis Counter</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <div class="navbar-nav app-left-pan-list-mr-pd">
      <div style="margin-top: 10px;">
          <p style="display: inline; margin-right: 20px;" class="app-left-pan-first-p">All analyses {{sizeof($AnalysisList)}}</p>
          <p style="display: inline;" class="app-left-pan-first-p">Visible analyses</p>
          <p id="Visible_Num" style="display: inline;" class="app-left-pan-first-p">{{sizeof($AnalysisList)}}</p>
      </div>
    </div>
  </nav>
</div>

<?php
if (sizeof($AnalysisList) > 50) {
  echo '<div id="Anaytics_Pager" class="Anaytics_Pager app-nopadding-nomargin">
          <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
          <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
        </div>';
}
?>
  
<table id="Table" name="Anaytics_Table" class="tablesorter" style="margin-bottom: 0 !important;">
  <thead>
    <tr>
      <th></th>
      <th>ID#</th>
      <th>Student</th>
      <th>Assessment Dates</th>
      <th>Assigned Date</th>
      <th>Create Date</th>
      <th>Created By</th>
      <th>Analysis ID#</th>
      <th style="display: none;">Last Analysis</th>
    </tr>
  </thead>

  <tbody>
    <?php
      $url_profile = url('/Student/ViewProfile/');
      $url_summary = url('/Student/ViewSummary/');
      $url_analysis_view = url('/analysis%20list/View/');
      foreach($AnalysisList as $value) {
        echo '<tr data-table-row-id="'.$value["ID"].'">';
          echo '<td>';
            echo '<span class="app-table-span-with-background-color poptext">'.$value["Permission"].'</span>';
          echo '</td>';
          echo '<td>';
            echo '<a title="Click to see student profile" style="text-decoration:underline; color: #337ab7;" href='.$url_profile.'/'.$value["ID"].'>'.$value["ID"].'</a>';
          echo '</td>';
          echo '<td>';
            echo '<a title="Click to see student summary" style="text-decoration:underline; color: #337ab7;" href='.$url_summary.'/'.$value["ID"].'>'.$value["Student"].'</a>';
          echo '</td>';
          echo '<td>';
            echo '<span style="margin-right: 5px; background-color:'.$value["Color"].';" class="app-table-span-without-background-color">&nbsp;&nbsp;&nbsp;</span>';
            echo $value["Assessment_Dates"];
          echo '</td>';
          echo '<td>';
            echo $value["Assigned_Date"];
          echo '</td>';
          echo '<td>';
            echo $value["Create_Date"];
          echo '</td>';
          echo '<td>';
            echo $value["Created_By"];
          echo '</td>';
          echo '<td>';
            echo '<a title="Click to view Analysis" style="text-decoration:underline; color: #337ab7;" href='.$url_analysis_view.'/'.$value["Analysis_ID"].'?a=1>'.$value["Analysis_ID"].'</a>';
          echo '</td>';
          echo '<td style="display: none;">';
            echo $value["Last_analyses"];
          echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>