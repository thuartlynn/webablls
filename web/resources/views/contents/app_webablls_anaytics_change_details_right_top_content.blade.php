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

  if (Auth::user()->show_help == 1) {
    echo '<div class="app-right-top-title app-nopadding-nomargin hidden">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Change Analysis Details / '.$Faker[0]["Student_Name"].' ('.$Faker[0]["Student_ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This screen allows revisions to be made to the Analysis Details</p>
              <p>Detail changes can include:</p>
              <ul>
                <li class="app-nopadding-nomargin">Assigned date</li>
                <li class="app-nopadding-nomargin">Selection of assessments</li>
                <li class="app-nopadding-nomargin">Content options</li>
                <li class="app-nopadding-nomargin">Output options</li>
                <li class="app-nopadding-nomargin">Normative Data selection</li>
                <li class="app-nopadding-nomargin">Graphing Options</li>
              </ul>
              <p>To view changes on the <b>Analysis</b> screen, click the <b>Save Changes</b> button or the <b>Yellow Save Banner</b> on the right to update the analysis details.</p>
              <p>Users can toggle back and forth to insure the analysis details and options selected are displayed to meet the user\'s needs.</p>
            </div>
            <div class="button">Show help</div>
          </div>';
  } else {
    echo '<div class="app-right-top-title app-nopadding-nomargin">
            <h1 class="app-right-top-h1 app-right-top-h1-title">Change Analysis Details / '.$Faker[0]["Student_Name"].' ('.$Faker[0]["Student_ID"].')</h1>
            <div class="app-right-top-content app-nopadding-nomargin">
              <p>This screen allows revisions to be made to the Analysis Details</p>
              <p>Detail changes can include:</p>
              <ul>
                <li class="app-nopadding-nomargin">Assigned date</li>
                <li class="app-nopadding-nomargin">Selection of assessments</li>
                <li class="app-nopadding-nomargin">Content options</li>
                <li class="app-nopadding-nomargin">Output options</li>
                <li class="app-nopadding-nomargin">Normative Data selection</li>
                <li class="app-nopadding-nomargin">Graphing Options</li>
              </ul>
              <p>To view changes on the <b>Analysis</b> screen, click the <b>Save Changes</b> button or the <b>Yellow Save Banner</b> on the right to update the analysis details.</p>
              <p>Users can toggle back and forth to insure the analysis details and options selected are displayed to meet the user\'s needs.</p>
            </div>
            <div class="button">Hide help</div>
          </div>';
  }
?>