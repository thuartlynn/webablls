<?php
  if (sizeof($Records) > 50) {
    echo '<div id="pager" class="pager app-nopadding-nomargin">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }


  if (sizeof($Records) > 0) {
    echo '<table id="UserTable" class="tablesorter" style="margin-bottom: 0 !important;">';
    echo '<thead>
            <tr>
              <th>Date</th>
              <th>User First Name</th>
              <th>User Last Name</th>
              <th>Description</th>
            </tr>
          </thead>';
  
    echo '<tbody>';
      foreach($Records as $value) {
        echo '<tr">';
          echo '<td>';
            echo $value["Date"];
          echo '</td>';
          echo '<td>';
            echo $value["FirstName"];
          echo '</td>';
          echo '<td>';
            echo $value["LastName"];
          echo '</td>';
          echo '<td>';
            echo $value["Description"];
          echo '</td>';
        echo '</tr>';
      }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p class="app-right-bottom-content">There is no data to show.</p>';
  }
?>