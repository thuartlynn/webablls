<?php
  echo '<h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Assigned Students</h1>';

  if (sizeof($AS) > 50) {
    echo '<div id="pager1" class="pager1 : -10px;">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }

  if (sizeof($AS) > 0) {
    echo '<table id="table1" class="table1 tablesorter app-nopadding-nomargin app-right-bottom-mr">';
    echo '<thead>
            <tr>
              <th>ID#</th>
              <th>Name</th>
              <th>Permissions</th>
              <th>Gender</th>
              <th>DOB</th>
              <th>Location</th>
            </tr>
          </thead>';
  
    echo '<tbody>';
        foreach($AS as $value) {
            echo '<tr data-table-row-id="'.$value["ID"].'">';
              echo '<td>';
                echo $value["ID"];
              echo '</td>';
              echo '<td>';
                echo $value["Name"];
              echo '</td>';
              echo '<td>';
                foreach($value["Permission"] as $Permissions) {
                  echo '<span class="app-table-span-with-background-color poptext">'.$Permissions.'</span>';
                }
              echo '</td>';
              echo '<td>';
                echo $value["Gender"];
              echo '</td>';
              echo '<td>';
                echo $value["DOB"];
              echo '</td>';
              echo '<td>';
                echo $value["Location"];
              echo '</td>';
            echo '</tr>';
        }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p class="app-right-bottom-content app-right-bottom-mr">No students to display.</p>';
  }
?>

<?php
  echo '<h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Shared Students within Organization</h1>';

  if (sizeof($SS) > 50) {
    echo '<div id="pager2" class="pager2 app-nopadding-nomargin" style="float: right; margin-bottom: -10px;">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }

  if (sizeof($SS) > 0) {
    echo '<table id="table2" class="table2 tablesorter app-nopadding-nomargin app-right-bottom-mr">';
    echo '<thead>
            <tr>
              <th>ID#</th>
              <th>Name</th>
              <th>Permissions</th>
              <th>Gender</th>
              <th>DOB</th>
              <th>Location</th>
            </tr>
          </thead>';
  
    echo '<tbody>';
        foreach($SS as $value) {
            echo '<tr data-table-row-id="'.$value["ID"].'">';
              echo '<td>';
                echo $value["ID"];
              echo '</td>';
              echo '<td>';
                echo $value["Name"];
              echo '</td>';
              echo '<td>';
                foreach($value["Permission"] as $Permissions) {
                  echo '<span class="app-table-span-with-background-color poptext">'.$Permissions.'</span>';
                }
              echo '</td>';
              echo '<td>';
                echo $value["Gender"];
              echo '</td>';
              echo '<td>';
                echo $value["DOB"];
              echo '</td>';
              echo '<td>';
                echo $value["Location"];
              echo '</td>';
            echo '</tr>';
        }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p class="app-right-bottom-content app-right-bottom-mr">No students to display.</p>';
  }
?>

<?php
  echo '<h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Other shared Students</h1>';

  if (sizeof($OS) > 50) {
    echo '<div id="pager3" class="pager3 app-nopadding-nomargin" style="float: right; margin-bottom: -10px;">
            <div style="float: left;" class="prev pager-button">&lt;&lt; previous page</div>
            <div style="float: right;" class="next pager-button">next page &gt;&gt;</div>
          </div>';
  }

  if (sizeof($OS) > 0) {
    echo '<table id="table3" class="tablesorter app-nopadding-nomargin table3 app-right-bottom-mr">';
    echo '<thead>
            <tr>
              <th>ID#</th>
              <th>Name</th>
              <th>Permissions</th>
              <th>Gender</th>
              <th>DOB</th>
              <th>Location</th>
            </tr>
          </thead>';
  
    echo '<tbody>';
        foreach($OS as $value) {
            echo '<tr data-table-row-id="'.$value["ID"].'">';
              echo '<td>';
                echo $value["ID"];
              echo '</td>';
              echo '<td>';
                echo $value["Name"];
              echo '</td>';
              echo '<td>';
                foreach($value["Permission"] as $Permissions) {
                  echo '<span class="app-table-span-with-background-color poptext">'.$Permissions.'</span>';
                }
              echo '</td>';
              echo '<td>';
                echo $value["Gender"];
              echo '</td>';
              echo '<td>';
                echo $value["DOB"];
              echo '</td>';
              echo '<td>';
                echo $value["Location"];
              echo '</td>';
            echo '</tr>';
        }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p class="app-right-bottom-content app-right-bottom-mr">No students to display.</p>';
  }
?>