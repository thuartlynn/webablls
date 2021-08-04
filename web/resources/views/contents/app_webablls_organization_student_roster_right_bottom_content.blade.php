<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Note: Missing students? See the <a style="text-decoration:underline; color: #337ab7;" href="{{url('/Organization/ArchivedStudents')}}">Archived Students</a> list.</span>  
  </div>
</div>

<?php
  if (sizeof($SeatData) > 50) {
    echo '<div id="pager" class="pager app-nopadding-nomargin">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }

  if (sizeof($SeatData) > 0) {
    echo '<table id="UserTable" class="tablesorter" style="margin-bottom: 0 !important;">
            <thead>
              <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Location</th>
              </tr>
            </thead>
    
            <tbody>';
    $url = url('/Organization/Students/EditProfile/');
    foreach($SeatData as $value) {
      echo '<tr data-table-row-id="'.$value["ID"].'">';
        echo "<td>";
          echo '<a title="Click to see Student Profile" style="text-decoration:underline; color: #337ab7;" href='.$url.'/'.$value["ID"].'>'.$value["ID"].'</a>';
        echo "</td>";
        echo "<td>";
          echo $value["Name"];
        echo "</td>";
        echo "<td>";
          echo $value["Gender"];
        echo "</td>";
        echo "<td>";
          echo $value["DOB"];
        echo "</td>";
        echo "<td>";
          echo $value["Location"];
        echo "</td>";
      echo "</tr>";
    }
    echo '</tbody>
          </table>';
  } else {
    echo '<p class="app-right-bottom-content">There is no data to show.</p>';
  }
?>