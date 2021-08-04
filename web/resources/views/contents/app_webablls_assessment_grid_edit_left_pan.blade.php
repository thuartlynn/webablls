<?php
    $Faker_Assessment_List = array( 0=>array("Name"=>"James Partington",
                                             "Date"=>"2/15/2020",
                                             "Icon"=>"0",
                                             "Color"=>"red",
                                             "ID"=>"1"),
                                    1=>array("Name"=>"James Partington",
                                             "Date"=>"2/17/2020",
                                             "Icon"=>"1",
                                             "Color"=>"green",
                                             "ID"=>"2"),
                                            );

  $select = "last";
  if (!empty($_GET['select'])) {
    $select = $_GET['select'];
  }
?>

@include('contents.app_webablls_anaytics_left_pan_list')

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Actions</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Actions</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="actions" class="navbar-nav app-left-pan-list-mr-pd">
      <li id="save_change" class="nav-item app-left-pan-point" data-index="Save">Save Changes</li>
      <li id="cancel_change" class="nav-item app-left-pan-point" data-index="Cancel">Cancel Changes</li>
      <li id="cat_mode" class="nav-item app-left-pan-point" data-index="/Assessment/TgvCatEdit/{{$AssInfo->get('AssID')}}/?filter=A">Cat Mode</li>
      <li id="text_mode" class="nav-item app-left-pan-point" data-index="/Assessment/TgvTextEdit/{{$AssInfo->get('AssID')}}/?filter=A">Text Mode</li>
      <li id="assessment_details" class="nav-item app-left-pan-point" data-index="/Assessment/Details/{{$AssInfo->get('AssID')}}">Assessment Details</li>
    </ul>
  </nav>
</div>

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Student Assessments</span>';
  } else {
    echo '<div class="app-left-pan" style="margin-top: 5px;">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student Assessments</span>';
  }
?>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <ul id="StudentAssessments" class="navbar-nav app-left-pan-list-mr-pd">
      <?php
        for ($i = 0; $i < sizeof($Ass_List);$i++) {
          if ($Ass_List[$i]["ID"] == $AssInfo->get('AssID')) {
            echo '<li class="app-disable nav-item app-left-pan-point" data-index="'.$Ass_List[$i]["ID"].'"><label class="app-left-pan-point" style="display: inline;"><span style="margin-top: -2px; vertical-align: middle; width: 10px; height: 10px; border: 1px solid gray; display: inline-block; background-color:'.$Ass_List[$i]["Color"].';"></span> <span style="vertical-align: middle;"> <span style="color: gray;">'.$Ass_List[$i]["Date"].'</span> <br>'.$Ass_List[$i]["Name"].'</span></label></li>';
          } else {
            echo '<li class="nav-item app-left-pan-point" data-index="'.$Ass_List[$i]["ID"].'"><label class="app-left-pan-point" style="display: inline;"><span style="margin-top: -2px; vertical-align: middle; width: 10px; height: 10px; border: 1px solid gray; display: inline-block; background-color:'.$Ass_List[$i]["Color"].';"></span> <span style="vertical-align: middle;"> <span style="text-decoration: underline; color: #337ab7;">'.$Ass_List[$i]["Date"].'</span> <br>'.$Ass_List[$i]["Name"].'</span></label></li>';
          }
        }
      ?>
    </ul>
  </nav>
</div>