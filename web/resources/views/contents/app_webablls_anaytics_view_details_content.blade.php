<?php
    $AnalysisDetails = array( 0=>array("Assigned_Date"=>"11/04/2019",
                                       "Assessments"=>array(0=>array("Color"=>"#00bfff",
                                                                     "Text"=>"Assessment 11/03/2019 (age 2 years, 11 months)"),
                                                            1=>array("Color"=>"#00bfff",
                                                                     "Text"=>"Assessment 11/03/2019 (age 2 years, 11 months)")),
                                       "Normative_Data"=>"2 years",
                                       "Output_Options"=>"Table analysis of single assesment",
                                       "Graphs_with_Total_Items_Scale"=>array(0=>"Include Section Graphs",
                                                                              1=>"Include Categories Graphs"),
                                       "Graphs_with_Total_Scores_Scale"=>array(0=>"Include Section Graphs",
                                                                               1=>"Include Categories Graphs"),
                                       "Graphs_with_Percentage_Scale"=>array(0=>"Include Section Graphs",
                                                                             1=> "Include Categories Graphs"),
                                       "Section_Analysis"=>array(0=>"Basic Language and Learner Skills Section (A-P)",
                                                                 1=>"Language Skills (C,E,F,G,H,I,J)",
                                                                 2=>"Academic Skills Section (Q-T)",
                                                                 3=>"Self-Help Skills Section (U-X)",
                                                                 4=>"Motor Skill Section (Y-Z)",
                                                                 5=>"Total ABLLS-R (A-Z)"),
                                       "Category_Analysis"=>array(  0=>"A. Cooperation and Reinfocer Effectiveness",
                                                                    1=>"B. Visual Performance",
                                                                    2=>"C. Receptive Language",
                                                                    3=>"D. Motor lmitation",
                                                                    4=>"E. Vocal lmitation",
                                                                    5=>"F. Requests",
                                                                    6=>"G. Labeling",
                                                                    7=>"H. Intraverbals",
                                                                    8=>"I. Spontaneous Vocalizations",
                                                                    9=>"J. Syntax and Grammar",
                                                                   10=>"K. Play and Leisure Skills",
                                                                   11=>"L. Social Interactions",
                                                                   12=>"M. Group Instruction",
                                                                   13=>"N. Follow Classroom Routines",
                                                                   14=>"P. Generalized Responding",
                                                                   15=>"Q. Reading Skills",
                                                                   16=>"R. Math Skills",
                                                                   17=>"S. Writing Skills",
                                                                   18=>"T. Spelling",
                                                                   19=>"U. Dressing Skills",
                                                                   20=>"V. Eating Skills",
                                                                   21=>"W. Grooming Skills",
                                                                   22=>"X. Toileting Skills",
                                                                   23=>"Y. Gross Motor Skills",
                                                                   24=>"Z. Fine Motor Skills")
                                       ));
?>

<p style="margin: 0; padding: 0;" class="mt-3 app-right-bottom-h1">Analysis Details</p>
<div class="container-fluid">
  <div class="row mt-3">
<?php
    foreach ($AnalysisDetails as $value) {
      echo '<div style="margin: 0; padding: 0;" class="col-md-6">';
        echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-h1-2">Assigned Date</p>';
        echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-content">'.$value["Assigned_Date"].'</p>';

        echo '<p style="margin: 0; padding: 0;" class="mt-2 app-right-bottom-h1-2">Assessments</p>';
        foreach ($value["Assessments"] as $contents) {
          echo '<div class="row" style="margin: 0px;">';
          echo '<p style="display: inline-block; width: 10px; height: 10px; border: 1px solid black; margin: 7px 5px 0  0; background-color:'.$contents["Color"].';"></p>';
          echo '<p style="display: inline-block; margin: 0; padding: 0;" class="app-right-bottom-content">'.$contents["Text"].'</p>';
          echo '</div>';
        }

        echo '<p style="clear: left; margin: 0; padding: 0px;" class="pt-2 app-right-bottom-h1-2">Normative Data</p>';
        echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-content">'.$value["Normative_Data"].'</p>';

        echo '<p style="margin: 0; padding: 0px;" class="mt-2 app-right-bottom-h1-2">Output Options</p>';
        echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-content">'.$value["Output_Options"].'</p>';

        echo '<p style="margin: 0; padding: 0px;" class="mt-2 app-right-bottom-h1-2">Graphs with Total Items Scale</p>';
        foreach ($value["Graphs_with_Total_Items_Scale"] as $contents) {
          echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-content">'.$contents.'</p>';
        }

        echo '<p style="margin: 0; padding: 0px;" class="mt-2 app-right-bottom-h1-2">Graphs with Total Scores Scale</p>';
        foreach ($value["Graphs_with_Total_Scores_Scale"] as $contents) {
          echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-content">'.$contents.'</p>';
        }

        echo '<p style="margin: 0; padding: 0px;" class="mt-2 app-right-bottom-h1-2">Graphs with Percentage Scale</p>';
        foreach ($value["Graphs_with_Percentage_Scale"] as $contents) {
          echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-content">'.$contents.'</p>';
        }
      echo '</div>';

      echo '<div style="margin: 0; padding: 0;" class="col-md-6">';
        echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-h1-2">Section Analysis</p>';
        foreach ($value["Section_Analysis"] as $contents) {
          echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-content">'.$contents.'</p>';
        }

        echo '<p style="margin: 0; padding: 0;" class="mt-2 app-right-bottom-h1-2">Category Analysis</p>';
        foreach ($value["Category_Analysis"] as $contents) {
          echo '<p style="margin: 0; padding: 0;" class="app-right-bottom-content">'.$contents.'</p>';
        }
      echo '</div>';
    }
?>
  </div>
</div>