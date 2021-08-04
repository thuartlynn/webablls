<?php
    $Faker = array( 0=>array("Student_Name"=> "William H",
                             "Student_ID"=>"11301",
                             "Assigned_ID"=>"731",
                             "Assigned_Date"=> "01/17/2020",
                             "Assessments"=>array(0=>array("Color"=>"#00bfff",
                                                           "Select"=>"0",
                                                           "Text"=>"Assessment 11/03/2019 (age 2 years, 11 months)"),
                                                  1=>array("Color"=>"#123456",
                                                           "Select"=>"1",
                                                           "Text"=>"Assessment 08/12/2020 (age 2 years, 11 months)")),
                             "Output_Options"=>array(0=>array("0"=>"0",
                                                              "1"=>"1")),
                             "Section_Analysis"=>array(0=>array("0"=>"1",
                                                                "1"=>"0",
                                                                "2"=>"0",
                                                                "3"=>"0",
                                                                "4"=>"0",
                                                                "5"=>"0")),
                             "Category_Analysis"=>array(0=>array("A"=>"1",
                                                                 "B"=>"0",
                                                                 "C"=>"0",
                                                                 "D"=>"0",
                                                                 "E"=>"0",
                                                                 "F"=>"0",
                                                                 "G"=>"0",
                                                                 "H"=>"0",
                                                                 "I"=>"0",
                                                                 "J"=>"0",
                                                                 "K"=>"0",
                                                                 "L"=>"0",
                                                                 "M"=>"0",
                                                                 "N"=>"0",
                                                                 "P"=>"0",
                                                                 "Q"=>"0",
                                                                 "R"=>"0",
                                                                 "S"=>"0",
                                                                 "T"=>"0",
                                                                 "U"=>"0",
                                                                 "V"=>"0",
                                                                 "W"=>"0",
                                                                 "X"=>"0",
                                                                 "Y"=>"0",
                                                                 "Z"=>"0")),
                             "Include_Normative_Data"=> "1",
                             "Select_Age"=> "3",
                             "Select_Age_Options"=>array(0=>array("0"=>"1 mounths",
                                                                  "1"=>"2 months",
                                                                  "2"=>"6 months",
                                                                  "3"=>"12 months",
                                                                  "4"=>"2 years")),
                             "Graphs_with_Total_Items_Scale"=>array(0=>array("0"=>"0",
                                                                             "1"=>"1")),
                             "Graphs_with_Total_Scores_Scale"=>array(0=>array("0"=>"0",
                                                                              "1"=>"1")),
                             "Graphs_with_Percentage_Scale"=>array(0=>array("0"=>"0",
                                                                            "1"=>"1"))
                            ));
?>

  <?php
    $url = url('/analysis list/ChangeDetails');
    echo '<form action="'.$url.'/'.$Faker[0]["Assigned_ID"].'" class="app-inline needs-validation" id="ChangeDetailsfrm" method="post" role="form" novalidate>'
  ?>

  {{ csrf_field() }}
  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Assigned Date</h1>

  <div class="app-right-bottom-mr">
    <input id="datepicker" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="Assigned_Date" type="text" value="<?php echo $Faker[0]["Assigned_Date"] ?>" required/>
    <div class="invalid-feedback">Assigned Date field is required</div>
  </div>

  <hr>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Assessments</h1>

  <div id="Assessments_Group" class="container-fluid">
    <?php
      $count = 0;
      foreach ($Faker[0]["Assessments"] as $value) {
        if ($count == 0) {
          echo '<div class="row">';
        } else {
          echo '<div class="row" style="margin-top: -10px;">';
        }

        if ($value["Select"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Assessments['.$count.']"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Assessments['.$count.']" name="Assessments['.$count.']" /> <span style="margin-right: 10px; vertical-align: middle; width: 11px; height: 12px; border: 1px solid gray; display: inline-block; background-color:'.$value["Color"].';"></span> <span style="vertical-align: middle;">'.$value["Text"].'</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Assessments['.$count.']"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Assessments['.$count.']" name="Assessments['.$count.']" /> <span style="margin-right: 10px; vertical-align: middle; width: 11px; height: 12px; border: 1px solid gray; display: inline-block; background-color:'.$value["Color"].';"></span> <span style="vertical-align: middle;">'.$value["Text"].'</span></label>';
        }
        
        echo '</div>';
        $count++;
      }
    ?>
  </div>

  <div>
    <button id="Assessments_clear" class="btn btn-sm btn-secondary" style="margin-right: 5px;" type="button">Clear</button>
    <button id="Assessments_select_all" class="btn btn-sm btn-secondary" type="button">Select All</button>
  </div>

  <hr>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Output Options<span id="Output_Options"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

  <div id="Output_Options_Group" class="container-fluid">
    <div class="row">
      <?php
        if ($Faker[0]["Output_Options"][0]["0"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Output_Options_Single"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Output_Options_Single" name="Output_Options_Single" /> <span style="vertical-align: middle;">Table analysis of single assessment</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Output_Options_Single"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Output_Options_Single" name="Output_Options_Single" /> <span style="vertical-align: middle;">Table analysis of single assessment</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Output_Options"][0]["1"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Output_Options_Multiple"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Output_Options_Multiple" name="Output_Options_Multiple" /> <span style="vertical-align: middle;">Table comparing multiple assessments (Select multiple assessments to enable)</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Output_Options_Multiple"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Output_Options_Multiple" name="Output_Options_Multiple" /> <span style="vertical-align: middle;">Table comparing multiple assessments (Select multiple assessments to enable)</span></label>';
        }
      ?>
    </div>
  </div>

  <hr>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Contentut Options<span id="Contentut_Options"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>
  <h1 class="app-right-bottom-h1-2 app-right-bottom-h1-mr">Section Analysis</h1>

  <div id="Section_Analysis_Group" class="container-fluid">
    <div class="row">
      <?php
        if ($Faker[0]["Section_Analysis"][0]["0"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_1"><input data-index="1" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_1" name="Section_Analysis_1" /> <span style="vertical-align: middle;">Basic Language and Learner Skills Section</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_1"><input checked="checked" data-index="1" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_1" name="Section_Analysis_1" /> <span style="vertical-align: middle;">Basic Language and Learner Skills Section</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Section_Analysis"][0]["1"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_2"><input data-index="2" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_2" name="Section_Analysis_2" /> <span style="vertical-align: middle;">Language Skills</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_2"><input checked="checked" data-index="2" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_2" name="Section_Analysis_2" /> <span style="vertical-align: middle;">Language Skills</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Section_Analysis"][0]["2"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_3"><input data-index="3" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_3" name="Section_Analysis_3" /> <span style="vertical-align: middle;">Academic Skills Section</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_3"><input checked="checked" data-index="3" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_3" name="Section_Analysis_3" /> <span style="vertical-align: middle;">Academic Skills Section</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Section_Analysis"][0]["3"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_4"><input data-index="4" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_4" name="Section_Analysis_4" /> <span style="vertical-align: middle;">Self-Help Skills Section</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_4"><input checked="checked" data-index="4" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_4" name="Section_Analysis_4" /> <span style="vertical-align: middle;">Self-Help Skills Section</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Section_Analysis"][0]["4"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_5"><input data-index="5" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_5" name="Section_Analysis_5" /> <span style="vertical-align: middle;">Motor Skills Section</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_5"><input checked="checked" data-index="5" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_5" name="Section_Analysis_5" /> <span style="vertical-align: middle;">Motor Skills Section</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Section_Analysis"][0]["5"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_6"><input data-index="6" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_6" name="Section_Analysis_6" /> <span style="vertical-align: middle;">Total ABLLS-R</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Section_Analysis_6"><input checked="checked" data-index="6" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Section_Analysis_6" name="Section_Analysis_6" /> <span style="vertical-align: middle;">Total ABLLS-R</span></label>';
        }
      ?>
    </div>
  </div>

  <h1 class="app-right-bottom-h1-2 app-right-bottom-h1-mr">Category Analysis</h1>

  <div id="Category_Analysis_Group" class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["A"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_A"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_A" name="Category_Analysis_A" /> <span style="vertical-align: middle;">A. Cooperation and Reinforcer Effectiveness</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_A"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_A" name="Category_Analysis_A" /> <span style="vertical-align: middle;">A. Cooperation and Reinforcer Effectiveness</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["B"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_B"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_B" name="Category_Analysis_B" /> <span style="vertical-align: middle;">B. Visual Performance</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_B"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_B" name="Category_Analysis_B" /> <span style="vertical-align: middle;">B. Visual Performance</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["C"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_C"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_C" name="Category_Analysis_C" /> <span style="vertical-align: middle;">C. Receptive Language</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_C"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_C" name="Category_Analysis_C" /> <span style="vertical-align: middle;">C. Receptive Language</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["D"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_D"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_D" name="Category_Analysis_D" /> <span style="vertical-align: middle;">D. Motor Imitation</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_D"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_D" name="Category_Analysis_D" /> <span style="vertical-align: middle;">D. Motor Imitation</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["E"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_E"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_E" name="Category_Analysis_E" /> <span style="vertical-align: middle;">E. Vocal Imitation</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_E"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_E" name="Category_Analysis_E" /> <span style="vertical-align: middle;">E. Vocal Imitation</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["F"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_F"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_F" name="Category_Analysis_F" /> <span style="vertical-align: middle;">F. Requests</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_F"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_F" name="Category_Analysis_F" /> <span style="vertical-align: middle;">F. Requests</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["G"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_G"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_G" name="Category_Analysis_G" /> <span style="vertical-align: middle;">G. Labeling</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_G"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_G" name="Category_Analysis_G" /> <span style="vertical-align: middle;">G. Labeling</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["H"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_H"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_H" name="Category_Analysis_H" /> <span style="vertical-align: middle;">H. Intraverbals</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_H"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_H" name="Category_Analysis_H" /> <span style="vertical-align: middle;">H. Intraverbals</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["I"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_I"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_I" name="Category_Analysis_I" /> <span style="vertical-align: middle;">I. Spontaneous Vocalizations</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_I"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_I" name="Category_Analysis_I" /> <span style="vertical-align: middle;">I. Spontaneous Vocalizations</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["J"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_J"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_J" name="Category_Analysis_J" /> <span style="vertical-align: middle;">J. Syntax and Grammar</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_J"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_J" name="Category_Analysis_J" /> <span style="vertical-align: middle;">J. Syntax and Grammar</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["K"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_K"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_K" name="Category_Analysis_K" /> <span style="vertical-align: middle;">K. Play and Leisure Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_K"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_K" name="Category_Analysis_K" /> <span style="vertical-align: middle;">K. Play and Leisure Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["L"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_L"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_L" name="Category_Analysis_L" /> <span style="vertical-align: middle;">L. Social Interactions</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_L"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_L" name="Category_Analysis_L" /> <span style="vertical-align: middle;">L. Social Interactions</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["M"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_M"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_M" name="Category_Analysis_M" /> <span style="vertical-align: middle;">M. Group Instruction</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_M"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_M" name="Category_Analysis_M" /> <span style="vertical-align: middle;">M. Group Instruction</span></label>';
            }
          ?>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["N"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_N"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_N" name="Category_Analysis_N" /> <span style="vertical-align: middle;">N. Follow Classroom Routines</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_N"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_N" name="Category_Analysis_N" /> <span style="vertical-align: middle;">N. Follow Classroom Routines</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["P"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_P"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_P" name="Category_Analysis_P" /> <span style="vertical-align: middle;">P. Generalized Responding</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_P"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_P" name="Category_Analysis_P" /> <span style="vertical-align: middle;">P. Generalized Responding</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["Q"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_Q"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_Q" name="Category_Analysis_Q" /> <span style="vertical-align: middle;">Q. Reading Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_Q"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_Q" name="Category_Analysis_Q" /> <span style="vertical-align: middle;">Q. Reading Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["R"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_R"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_R" name="Category_Analysis_R" /> <span style="vertical-align: middle;">R. Math Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_R"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_R" name="Category_Analysis_R" /> <span style="vertical-align: middle;">R. Math Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["S"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_S"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_S" name="Category_Analysis_S" /> <span style="vertical-align: middle;">S. Writing Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_S"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_S" name="Category_Analysis_S" /> <span style="vertical-align: middle;">S. Writing Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["T"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_T"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_T" name="Category_Analysis_T" /> <span style="vertical-align: middle;">T. Spelling</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_T"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_T" name="Category_Analysis_T" /> <span style="vertical-align: middle;">T. Spelling</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["U"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_U"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_U" name="Category_Analysis_U" /> <span style="vertical-align: middle;">U. Dressing Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_U"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_U" name="Category_Analysis_U" /> <span style="vertical-align: middle;">U. Dressing Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["V"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_V"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_V" name="Category_Analysis_V" /> <span style="vertical-align: middle;">V. Eating Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_V"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_V" name="Category_Analysis_V" /> <span style="vertical-align: middle;">V. Eating Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["W"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_W"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_W" name="Category_Analysis_W" /> <span style="vertical-align: middle;">W. Grooming Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_W"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_W" name="Category_Analysis_W" /> <span style="vertical-align: middle;">W. Grooming Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["X"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_X"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_X" name="Category_Analysis_X" /> <span style="vertical-align: middle;">X. Toileting Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_X"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_X" name="Category_Analysis_X" /> <span style="vertical-align: middle;">X. Toileting Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["Y"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_Y"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_Y" name="Category_Analysis_Y" /> <span style="vertical-align: middle;">Y. Gross Motor Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_Y"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_Y" name="Category_Analysis_Y" /> <span style="vertical-align: middle;">Y. Gross Motor Skills</span></label>';
            }
          ?>
        </div>
        <div class="row" style="margin-top: -10px;">
          <?php
            if ($Faker[0]["Category_Analysis"][0]["Z"] == "0") {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_Z"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_Z" name="Category_Analysis_Z" /> <span style="vertical-align: middle;">Z. Fine Motor Skills</span></label>';
            } else {
              echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Category_Analysis_Z"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Category_Analysis_Z" name="Category_Analysis_Z" /> <span style="vertical-align: middle;">Z. Fine Motor Skills</span></label>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div>
    <button id="Category_Analysis_clear" class="btn btn-sm btn-secondary" style="margin-right: 5px;" type="button">Clear</button>
    <button id="Category_Analysis_select_all" class="btn btn-sm btn-secondary" type="button">Select All</button>
  </div>

  <hr>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Normative Data<span id="Normative_Data"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-h1-2 " for="Include_normative_data">Include normative data</label>
    <div class ="app-right-bottom-content-2-mr">
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="Include_normative_data_No" name="Include_normative_data" value = "0" />
      <label class="custom-control-label app-option-font" for="Include_normative_data_No">No</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" class="custom-control-input" id="Include_normative_data_Yes" name="Include_normative_data" value = "1" />
      <label class="custom-control-label app-option-font" for="Include_normative_data_Yes">Yes</label>
    </div> 
    </div>
  </div>

  <div>
    <div>
      <label class="app-right-bottom-h1-2 " for="Include_normative_data">Select age</label>
    </div>
    <div>
      <select id="Select_age_id" name="Select_age" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
        <?php
          for ($count = 0; $count < sizeof($Faker[0]["Select_Age_Options"][0]) ;$count++) {
            echo '<option value="'.$count.'">'.$Faker[0]["Select_Age_Options"][0][$count].'</option>';

          }
        ?>
      </select>
    </div>
    <!--a  style="text-decoration: underline; font-size: 11pt;" href="#" target="_blank">Learn more about the Normative Data</a-->  
  </div>

  <hr>

  <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Graphing Options</h1>

  <h1 class="app-right-bottom-h1-2 app-right-bottom-h1-mr">Graphs with Total Items Scale<span id="Graphing_Options_1"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

  <div id="Graphing_Options_Group1" class="container-fluid">
    <div class="row">
      <?php
        if ($Faker[0]["Graphs_with_Total_Items_Scale"][0]["0"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Items_Scale_Section"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Items_Scale_Section" name="Graphs_with_Total_Items_Scale_Section" /> <span style="vertical-align: middle;">Include Section Graphs</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Items_Scale_Section"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Items_Scale_Section" name="Graphs_with_Total_Items_Scale_Section" /> <span style="vertical-align: middle;">Include Section Graphs</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Graphs_with_Total_Items_Scale"][0]["1"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Items_Scale_Categories"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Items_Scale_Categories" name="Graphs_with_Total_Items_Scale_Categories" /> <span style="vertical-align: middle;">Include Categories Graphs</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Items_Scale_Categories"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Items_Scale_Categories" name="Graphs_with_Total_Items_Scale_Categories" /> <span style="vertical-align: middle;">Include Categories Graphs</span></label>';
        }
      ?>
    </div>
  </div>

  <h1 class="app-right-bottom-h1-2 app-right-bottom-h1-mr">Graphs with Total Scores Scale<span id="Graphing_Options_2"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

  <div id="Graphing_Options_Group2" class="container-fluid">
    <div class="row">
      <?php
        if ($Faker[0]["Graphs_with_Total_Scores_Scale"][0]["0"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Scores_Scale_Section"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Scores_Scale_Section" name="Graphs_with_Total_Scores_Scale_Section" /> <span style="vertical-align: middle;">Include Section Graphs</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Scores_Scale_Section"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Scores_Scale_Section" name="Graphs_with_Total_Scores_Scale_Section" /> <span style="vertical-align: middle;">Include Section Graphs</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Graphs_with_Total_Scores_Scale"][0]["1"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Scores_Scale_Categories"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Scores_Scale_Categories" name="Graphs_with_Total_Scores_Scale_Categories" /> <span style="vertical-align: middle;">Include Categories Graphs</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Scores_Scale_Categories"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Scores_Scale_Categories" name="Graphs_with_Total_Scores_Scale_Categories" /> <span style="vertical-align: middle;">Include Categories Graphs</span></label>';
        }
      ?>
    </div>
  </div>

  <h1 class="app-right-bottom-h1-2 app-right-bottom-h1-mr">Graphs with Percentage Scale<span id="Graphing_Options_3"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

  <div id="Graphing_Options_Group3" class="container-fluid">
    <div class="row">
      <?php
        if ($Faker[0]["Graphs_with_Percentage_Scale"][0]["0"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Percentage_Scale_Section"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Percentage_Scale_Section" name="Graphs_with_Total_Percentage_Scale_Section" /> <span style="vertical-align: middle;">Include Section Graphs</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Percentage_Scale_Section"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Percentage_Scale_Section" name="Graphs_with_Total_Percentage_Scale_Section" /> <span style="vertical-align: middle;">Include Section Graphs</span></label>';
        }
      ?>
    </div>

    <div class="row" style="margin-top: -10px;">
      <?php
        if ($Faker[0]["Graphs_with_Percentage_Scale"][0]["1"] == "0") {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Percentage_Scale_Categories"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Percentage_Scale_Categories" name="Graphs_with_Total_Percentage_Scale_Categories" /> <span style="vertical-align: middle;">Include Categories Graphs</span></label>';
        } else {
          echo '<label class="app-right-bottom-content" style="display: inline-block; padding-right: 10px;" for="Graphs_with_Total_Percentage_Scale_Categories"><input checked="checked" class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Percentage_Scale_Categories" name="Graphs_with_Total_Percentage_Scale_Categories" /> <span style="vertical-align: middle;">Include Categories Graphs</span></label>';
        }
      ?>
    </div>
  </div>

  <div>
    <button id="Graphing_Options_clear" class="btn btn-sm btn-secondary" style="margin-right: 5px;" type="button">Clear</button>
    <button id="Graphing_Options_select_all" class="btn btn-sm btn-secondary" type="button">Select All</button>
  </div>

  <hr>

  <input type="submit" name="SaveChange" value="Save Changes" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>

<input type="submit" value="Cancel" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="cancel()"/>