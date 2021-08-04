<?php
  if (sizeof($Bulletin) > 0) {
    echo '<div style="margin-top: 15px; background-color: #d3dce0; padding: 10px;">
            <div style="margin-bottom: 5px;">
              <h1 style="display: inline; margin: 0px;" class="app-right-bottom-h1">Bulletin Board</h1>
              <p id="pager1_collapse" style="margin-top: 8px; right: 25px; display: inline; font-size: 10pt; font-weight: bold; cursor: pointer; color: #127ebf; position: absolute;">Collapse</p>
          </div>
          <table id="table1" class="table1 tablesorter app-nopadding-nomargin" style="text-align: left; background-color: #d3dce0;">
            <thead>
              <tr>
                <th style="width:10%">Date</th>
                <th style="width:60%">Title</th>
                <th style="width:25%">Attachment</th>
                <th style="width:5%"></th>
              </tr>
          </thead>

          <tbody>';
    $count = 0;
    foreach($Bulletin as $value) {
      echo '<tr>';
        echo '<td>';
          echo $value["Announcement"];
        echo '</td>';
        echo '<td>';
          echo $value["Title"];
        echo '</td>';
        echo '<td>';
          echo '<span><a title="Click to download file" style="color: #337ab7;" href="Dashboard/BulletinBoard/Download/'.$value["ID"].'">'.$value["FileName"].'</a></span>';
        echo '</td>';
        echo '<td>';
          if ($value["Content"] != "") {
            echo '<a data-index="'.$count.'" href="#" class="toggle" style="color: black; text-decoration:underline; cursor: pointer;">more</a>';
          }
        echo '</td>';
      echo '</tr>';
      $count++;
    }
    echo '</tbody>
          </table>';

    echo '<div id="pager1" class="pager1" style="margin-top: -10px;">';
    echo '<div class="row">';
    if (sizeof($Bulletin) <= 50) {
      echo '<div style="cursor: pointer; text-align: left; margin-left: 10px;" class="prev pager-button app-disappear">&lt;&lt; previous</div>';
    } else {
      echo '<div style="cursor: pointer; text-align: left; margin-left: 10px;" class="prev pager-button">&lt;&lt; previous</div>';
    }
    echo '<div style="font-family: Arial; color: gray; font-size: 8pt; font-weight: bold; margin-top: 5px;" class="pagedisplay col align-self-center"></div>';
    if (sizeof($Bulletin) <= 50) {
      echo '<div style="cursor: pointer; text-align: right; margin-right: 10px;" class="next pager-button app-disappear">next &gt;&gt;</div>';
    } else {
      echo '<div style="cursor: pointer; text-align: right; margin-right: 10px;" class="next pager-button">next &gt;&gt;</div>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}
?>

<div style="margin-top: 15px; background-color: #d3dce0; padding: 10px;" class="app-disappear">
  <div style="margin-bottom: 5px;">
    <h1 style="display: inline; margin: 0px;" class="app-right-bottom-h1">System Messages</h1>
    <p id="pager2_collapse" style="margin-top: 8px; right: 25px; display: inline; font-size: 10pt; font-weight: bold; cursor: pointer; color: #127ebf; position: absolute;">Collapse</p>
  </div>

  <table id="table2" class="table2 tablesorter app-nopadding-nomargin" style="text-align: left; background-color: #d3dce0;">
    <thead>
      <tr>
        <th style="width:20%">Date</th>
        <th>Subject</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($System_Messages as $value) {
          echo '<tr>';
            echo '<td>';
              echo $value["Date"];
            echo '</td>';
            echo '<td>';
              echo $value["Subject"];
            echo '</td>';
          echo '</tr>';
          echo '<tr class="tablesorter-childRow">';
            echo '<td colspan="2">';
              echo '<div style="padding-left: 5px;">'.$value["Messgae"].'</div>';
            echo '</td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>

  <div id="pager2" class="pager2" style="margin-top: -10px;">
    <div class="row">
      <?php
        if (sizeof($System_Messages) <= 50) {
          echo '<div style="cursor: pointer; text-align: left; margin-left: 10px;" class="prev pager-button app-disappear">&lt;&lt; previous</div>';
        } else {
          echo '<div style="cursor: pointer; text-align: left; margin-left: 10px;" class="prev pager-button">&lt;&lt; previous</div>';
        }
      ?>
      <div style="font-family: Arial; color: gray; font-size: 8pt; font-weight: bold; margin-top: 5px;" class="pagedisplay col align-self-center"></div>
      <?php
        if (sizeof($System_Messages) <= 50) {
          echo '<div style="cursor: pointer; text-align: right; margin-right: 10px;" class="next pager-button app-disappear">next &gt;&gt;</div>';
        } else {
          echo '<div style="cursor: pointer; text-align: right; margin-right: 10px;" class="next pager-button">next &gt;&gt;</div>';
        }
      ?>
    </div>
  </div>
</div>

<div style="margin-top: 15px; background-color: #d3dce0; padding: 10px;">
  <div style="margin-bottom: 5px;">
    <h1 style="display: inline; margin: 0px;" class="app-right-bottom-h1">Login History</h1>
    <p id="pager3_collapse" style="margin-top: 8px; right: 25px; display: inline; font-size: 10pt; font-weight: bold; cursor: pointer; color: #127ebf; position: absolute;">Collapse</p>
  </div>

  <table id="table3" class="table3 tablesorter app-nopadding-nomargin" style="text-align: left; background-color: #d3dce0;">
    <thead>
      <tr>
        <th style="width:20%">Name</th>
        <th>Last Login</th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach($Login_History as $value) {
          echo '<tr>';
            echo '<td>';
              echo $value["Name"];
            echo '</td>';
            echo '<td>';
              echo $value["Last_Login"];
            echo '</td>';
          echo '</tr>';
        }
      ?>
    </tbody>
  </table>

  <div id="pager3" class="pager3" style="margin-top: -10px;">
    <div class="row">
      <?php
        if (sizeof($Login_History) <= 50) {
          echo '<div style="cursor: pointer; text-align: left; margin-left: 10px;" class="prev pager-button app-disappear">&lt;&lt; previous</div>';
        } else {
          echo '<div style="cursor: pointer; text-align: left; margin-left: 10px;" class="prev pager-button">&lt;&lt; previous</div>';
        }
      ?>
      <div style="font-family: Arial; color: gray; font-size: 8pt; font-weight: bold; margin-top: 5px;" class="pagedisplay col align-self-center"></div>
      <?php
        if (sizeof($Login_History) <= 50) {
          echo '<div style="cursor: pointer; text-align: right; margin-right: 10px;" class="next pager-button app-disappear">next &gt;&gt;</div>';
        } else {
          echo '<div style="cursor: pointer; text-align: right; margin-right: 10px;" class="next pager-button">next &gt;&gt;</div>';
        }
      ?>
    </div>
  </div>
</div>


<div><button class="btn btn-info"><a href="{{ url('/Anaytics_View') }}">analytics</a></button></div>