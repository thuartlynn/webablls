<?php
    $AnalysisDetails = array( 0=>array(
                                       "Assessments"=>array(0=> array("color" => "#E67E22", "Createdate" => "01/08/2019", "Age" => "7 years, 9 months"),
                                                            1=> array("color" => "#E1F42E", "Createdate" => "07/08/2015", "Age" => "4 years, 1 months"),
                                                            2=> array("color" => "#2E55F4", "Createdate" => "01/16/2015", "Age" => "4 years, 0 months")),
                                       "Normative_Data"=>"2 years",
                                       "Options"=>array(0=>"Include Initial Assessment Analysis",
                                                        1=>"Include Development Assessment Analysis"),
                                       "Graphs_with_Percentage_Scale"=>array(0=>"Include Section Graphs",
                                                        1=> "Include Categories Graphs"),
                                       "Graphs_with_Total_Scores_Scale"=>array(0=>"Include Section Graphs",
                                                        1=>"Include Category Graphs"),
                                       "Graphs_with_Total_Items_Scale"=>array(0=>"Include Section Graphs",
                                                                              1=>"Include Category Graphs"),
                                       "Section_Analysis"=>array(0=>"Basic Language and Learner Skills Section (A-P)"),
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

<div class="mt-3">
  <div class="row">
    <div class="col-md-6">
    <span class="text-secondary">Assessment</span>
      <?php
        foreach ($AnalysisDetails as $value) {
          if ($value["Assessments"] == true) {
            foreach ($value["Assessments"] as $vassess) {
              echo '<div class="form-group">';
              echo '<div class=""> 
                    <p class="small"><span class="mark" style="background-color:'.$vassess["color"].';"></span><label>Assessment '.$vassess["Createdate"].'</label>('.$vassess["Age"].')</p>
                    </div></div>';
            }
          }
        }
      ?>
      <div class="mt-3">
        <span class="text-secondary" id="options">Options<i class="fas fa-sm fa-question-circle ml-1"></i></span>
        <?php
          if ($value["Options"] == true) {
            foreach ($value["Options"] as $voption) {
              echo '<p class="small m-0">'.$voption.'</p>';
            }
          }
        ?>
      </div>
      <div class="mt-3">
        <span class="text-secondary" id="options">Graphs with Percentage Scale<i class="fas fa-sm fa-question-circle ml-1"></i></span>
        <?php
          if ($value["Graphs_with_Percentage_Scale"] == true) {
            foreach ($value["Graphs_with_Percentage_Scale"] as $vGraphs_with_Percentage_Scale) {
              echo '<p class="small m-0">'.$vGraphs_with_Percentage_Scale.'</p>';
            }
          }
        ?>
      </div>
      <div class="mt-3">
        <span class="text-secondary" id="options">Graphs with Total Scores Scale<i class="fas fa-sm fa-question-circle ml-1"></i></span>
        <?php
          if ($value["Graphs_with_Total_Scores_Scale"] == true) {
            foreach ($value["Graphs_with_Total_Scores_Scale"] as $vGraphs_with_Total_Scores_Scale) {
              echo '<p class="small m-0">'.$vGraphs_with_Total_Scores_Scale.'</p>';
            }
          }
        ?>
      </div>
      <div class="mt-3">
        <span class="text-secondary" id="options">Graphs with Total Items Scale<i class="fas fa-sm fa-question-circle ml-1"></i></span>
        <?php
          if ($value["Graphs_with_Total_Items_Scale"] == true) {
            foreach ($value["Graphs_with_Total_Items_Scale"] as $vGraphs_with_Total_Items_Scale) {
              echo '<p class="small m-0">'.$vGraphs_with_Total_Items_Scale.'</p>';
            }
          }
        ?>
      </div>
    </div>
    <div class="col-md-6">
    <span class="text-secondary">Section Analysis</span>
      <?php
        if ($value["Section_Analysis"] == true) {
          foreach ($value["Section_Analysis"] as $vSection_Analysis) {
            echo '<p class="small m-0">'.$vSection_Analysis.'</p>';
          }
        }
      ?>
      <div class="mt-3">
        <span class="text-secondary" id="options">Gategory Analysis<i class="fas fa-sm fa-question-circle ml-1"></i></span>
        <?php
          if ($value["Category_Analysis"] == true) {
            foreach ($value["Category_Analysis"] as $vCategory_Analysis) {
              echo '<p class="small m-0">'.$vCategory_Analysis.'</p>';
            }
          }
        ?>
      </div>

    </div>
  </div>
  <input class="btn btn-sm btn-secondary" type ="button" onclick="javascript:location.href='/Student/AnalyticsList/'" value="Change Analysis Options"></input>
</div>
