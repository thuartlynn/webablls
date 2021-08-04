<div>
  <p class="app-right-bottom-h1-2 app-nopadding-nomargin">Video Index</p>

<?php
  echo '<table id="table1" class="table1 tablesorter app-nopadding-nomargin" style="text-align: left;">';
  echo '<thead>
          <tr>
            <th>Task Number</th>
            <th>Task Number</th>
            <th>Video Link</th>
            <th>Task File</th>
          </tr>
        </thead>';

    echo '<tbody>';
    foreach($Video_Index_List as $value) {
      echo '<tr>';
        echo '<td>';
          echo $value["Number"];
        echo '</td>';
        echo '<td>';
          echo $value["Name"];
        echo '</td>';
        echo '<td>';
          echo $value["Link"];
        echo '</td>';
        echo '<td>';
          foreach ($value["File"] as $file) {
            echo '<div>';
              echo $file;
            echo '</div>';
          }
        echo '</td>';
      echo '</tr>';
    }
    echo '</tbody>';
  echo '</table>';
?>

</div>