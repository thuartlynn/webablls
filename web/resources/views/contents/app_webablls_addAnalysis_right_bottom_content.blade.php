
<div class="row ml-1">
    <?php
        $Url = url('Student/addAnalysis');
        $Id = $Student->get("ID");
        echo '<form id="addAnalysis" action="'.$Url.'/ + '.$Id.'" class="app-inline" method="post" role="form">';
    ?>{{ csrf_field() }}

    <div class="mt-3" id="select">
      <p id="select1" class="hide addAnalysisred">・At least one assessment must be selected.</p>
      <p id="select2" class="hide addAnalysisred">・At least one section or one category must be selected.</p>
      <p id="select3" class="hide addAnalysisred">・At least one analysis option must be selected.</p>
    </div>

    <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Assigned Date</h1>

    <div class="app-right-bottom-mr">
      <input id="datepicker" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="Assigned_Date" type="text" required/>
      <div class="invalid-feedback">Assigned Date field is required</div>
    </div>
    <hr>
    <span class="text-secondary">Assessment</span>
    <?php
      $Assessment = array( 0=> array("ID"=>"48", "color" => "#E67E22", "Createdate" => "01/08/2019", "Age" => "7 years, 9 months"),
                           1=> array("ID"=>"19", "color" => "#E1F42E", "Createdate" => "07/08/2015", "Age" => "4 years, 1 months"),
                           2=> array("ID"=>"17", "color" => "#2E55F4", "Createdate" => "01/16/2015", "Age" => "4 years, 0 months"),
                           3=> array("ID"=>"12", "color" => "#E1F42E", "Createdate" => "06/20/2014", "Age" => "3 years, 6 months"),
                           4=> array("ID"=>"11", "color" => "#E67E22", "Createdate" => "03/06/2014", "Age" => "3 years, 3 months")
                         );
    ?>
    <?php
      echo '<div class="form-group" id="assess">';
      foreach ($Assessment as $value) {
        echo'
            <label for="assessment'.$value["ID"].'" class="d-block">
            <input id="assessment'.$value["ID"].'" type="checkbox" name="assess['.$value["ID"].']" value="true" onClick="onCheckBox(this);" /> 
            <span class="mark align-middle" style="background-color:'.$value["color"].';"></span>Assessment '.$value["Createdate"].'('.$value["Age"].')
            </label>';
      }
      echo '</div>';
    ?>

    <div>
      <input type="button" name="clearassessment" value="Clear" id="ClearAllassess" />
      <input type="button" name="allassessment" value="Select All" id="CheckAllassess" />      
    </div>

    <hr>

    <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Output Options<span id="Output_Options"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

    <div id="Output_Options_Group">
      <div class="mt-2">
        <label class="d-block" for="Output_Options_Single1"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Output_Options_Single1" name="Output_Options_Single" />Table analysis of single assessment</label>
        <label class="d-block" for="Output_Options_Single2"><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Output_Options_Single2" name="Output_Options_Single" />Table comparing multiple assessments (Select multiple assessments to enable)</label>
      </div>
    </div>
    
    <hr>

    <div class="mt-3 form-group" id="Contentut_Options">
      <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Contentut Options<span id="Output_Options"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>
      <span class="text-secondary">Section Analysis<i class="fas fa-sm fa-question-circle ml-1"></i></span>
        <label class="d-block" for="A-P"><input class="mr-2" id="A-P" style="vertical-align: middle;" type="checkbox" name="analysis[]" onclick="check_AtoP(this)" />Basic Language and Learner Skills Section (A-P).</label>
        <label class="d-block" for="C-J"><input class="mr-2" id="C-J" style="vertical-align: middle;" type="checkbox" name="analysis[]" onclick="check_CtoJ(this)" />Language Skills (C,E,F,G,H,I,J).</label>
        <label class="d-block" for="Q-T"><input class="mr-2" id="Q-T" style="vertical-align: middle;" type="checkbox" name="analysis[]" onclick="check_QtoT(this)" />Academic Skills Section (Q-T).</label>
        <label class="d-block" for="U-X"><input class="mr-2" id="U-X" style="vertical-align: middle;" type="checkbox" name="analysis[]" onclick="check_UtoX(this)" />Self-Help Skills Section (U-X).</label>
        <label class="d-block" for="Y-Z"><input class="mr-2" id="Y-Z" style="vertical-align: middle;" type="checkbox" name="analysis[]" onclick="check_YtoZ(this)" />Motor Skills Section (Y-Z).</label>
        <label class="d-block" for="A-Z"><input class="mr-2" id="A-Z" style="vertical-align: middle;" type="checkbox" name="analysis[]" onclick="check_AtoZ(this)" />Total ABLLS-R (A-Z).</label>
        <br>
      <span class="text-secondary" id="">Category Analysis</span>
        <label class="d-block" for="category1"><input id="category1" class="mr-1 AtoP" type="checkbox" name="categoryA[]" />A. Cooperation and Reinforcer Effectiveness</label>
        <label class="d-block" for="category2"><input id="category2" class="mr-1 AtoP" type="checkbox" name="categoryA[]" />B. Visual Performance</label>
        <label class="d-block" for="category3"><input id="category3" class="mr-1 AtoP CtoJ" type="checkbox" name="categoryA[]" />C. Receptive Language</label>
        <label class="d-block" for="category4"><input id="category4" class="mr-1 AtoP" type="checkbox" name="categoryA[]" />D. Motor Imitation</label>
        <label class="d-block" for="category5"><input id="category5" class="mr-1 AtoP CtoJ" type="checkbox" name="categoryA[]" />E. Vocal Imitation</label>
        <label class="d-block" for="category6"><input id="category6" class="mr-1 AtoP CtoJ" type="checkbox" name="categoryA[]" />F. Requests</label>
        <label class="d-block" for="category7"><input id="category7" class="mr-1 AtoP CtoJ" type="checkbox" name="categoryA[]" />G. Labeling</label>
        <label class="d-block" for="category8"><input id="category8" class="mr-1 AtoP CtoJ" type="checkbox" name="categoryA[]" />H. Intraverbals</label>
        <label class="d-block" for="category9"><input id="category9" class="mr-1 AtoP CtoJ" type="checkbox" name="categoryA[]" />I. Spontaneous Vocalizations</label>
        <label class="d-block" for="category10"><input id="category10" class="mr-1 AtoP CtoJ" type="checkbox" name="categoryA[]" />J. Syatax and Grammar</label>
        <label class="d-block" for="category11"><input id="category11" class="mr-1 AtoP" type="checkbox" name="categoryA[]" />K. Play and Leisure Skills</label>
        <label class="d-block" for="category12"><input id="category12" class="mr-1 AtoP" type="checkbox" name="categoryA[]" />L. Social Interactions</label>
        <label class="d-block" for="category13"><input id="category13" class="mr-1 AtoP" type="checkbox" name="categoryA[]" />M. Group Instruction</label>
        <label class="d-block" for="category14"><input id="category14" class="mr-1 AtoP" type="checkbox" name="categoryA[]" />N. Follow Classroom Routines</label>
        <label class="d-block" for="category15"><input id="category15" class="mr-1 AtoP" type="checkbox" name="categoryA[]" />P. Generalized Responding</label>
        <label class="d-block" for="category16"><input id="category16" class="mr-1 QtoT" type="checkbox" name="categoryA[]" />Q. Reading Skills</label>
        <label class="d-block" for="category17"><input id="category17" class="mr-1 QtoT" type="checkbox" name="categoryA[]" />R. Math Skills</label>
        <label class="d-block" for="category18"><input id="category18" class="mr-1 QtoT" type="checkbox" name="categoryA[]" />S. Writing Skills</label>
        <label class="d-block" for="category19"><input id="category19" class="mr-1 QtoT" type="checkbox" name="categoryA[]" />T. Spelling</label>
        <label class="d-block" for="category20"><input id="category20" class="mr-1 UtoX" type="checkbox" name="categoryA[]" />U. Dressing Skills</label>
        <label class="d-block" for="category21"><input id="category21" class="mr-1 UtoX" type="checkbox" name="categoryA[]" />V. Eating Skills</label>
        <label class="d-block" for="category22"><input id="category22" class="mr-1 UtoX" type="checkbox" name="categoryA[]" />W. Grooming Skills</label>
        <label class="d-block" for="category23"><input id="category23" class="mr-1 UtoX" type="checkbox" name="categoryA[]" />X. Toileting Skills</label>
        <label class="d-block" for="category24"><input id="category24" class="mr-1 YtoZ" type="checkbox" name="categoryA[]" />Y. Gross Motor Skills</label>
        <label class="d-block" for="category25"><input id="category25" class="mr-1 YtoZ" type="checkbox" name="categoryA[]" />Z. Fine Motor Skills</label>
           <input type="button" name="clearcategoryA" value="Clear" id="ClearAllcategorya" />
           <input type="button" name="allcategoryA" value="Select All" id="CheckAllcategorya" />
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

    <?php
      $Faker = array("Select_Age_Options"=>array(0=>array("0"=>"1 mounths",
                                                          "1"=>"2 months",
                                                          "2"=>"6 months",
                                                          "3"=>"12 months",
                                                          "4"=>"2 years"))
                  );
    ?>

    <div>
      <div>
        <label class="app-right-bottom-h1-2 " for="Include_normative_data">Select age</label>
      </div>
      <div>
        <select id="Select_age_id" name="Select_age" class="custom-select app-option-font app-right-bottom-content-mr" style="width: auto;">
          <?php
            for ($count = 0; $count < sizeof($Faker["Select_Age_Options"][0]) ;$count++) {
              echo '<option value="'.$count.'">'.$Faker["Select_Age_Options"][0][$count].'</option>';

            }
          ?>
        </select>
      </div>
      <!--a  style="text-decoration: underline; font-size: 11pt;" href="#" target="_blank">Learn more about the Normative Data</a-->  
    </div>

    <hr>

    <div id="Graphing_Options_Group">
    <h1 class="app-right-bottom-h1 app-right-bottom-h1-mr">Graphing Options</h1>

    <h1 class="app-right-bottom-h1-2 app-right-bottom-h1-mr">Graphs with Total Items Scale<span id="Graphing_Options_1"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

    <div id="Graphing_Options_Group1" class="container-fluid">
        <p><input class="mr-2 mb-0" type="checkbox" id="Graphs_with_Total_Items_Scale_Section" name="Graphs_with_Total_Items_Scale_Section" /> Include Section Graphs<br>
           <input class="mr-2" type="checkbox" id="Graphs_with_Total_Items_Scale_Categories" name="Graphs_with_Total_Items_Scale_Categories" />Include Categories Graphs</p>
    </div>

    <h1 class="app-right-bottom-h1-2 app-right-bottom-h1-mr">Graphs with Total Scores Scale<span id="Graphing_Options_2"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

    <div id="Graphing_Options_Group2" class="container-fluid">
        <p><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Scores_Scale_Section" name="Graphs_with_Total_Scores_Scale_Section" />Include Section Graphs<br>
           <input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Scores_Scale_Categories" name="Graphs_with_Total_Scores_Scale_Categories" />Include Categories Graphs</p>
    </div>

    <h1 class="app-right-bottom-h1-2 app-right-bottom-h1-mr">Graphs with Percentage Scale<span id="Graphing_Options_3"><i class="fas fa-sm fa-question-circle ml-1"></i></span></h1>

    <div id="Graphing_Options_Group3" class="container-fluid">
        <p><input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Percentage_Scale_Section" name="Graphs_with_Total_Percentage_Scale_Section" />Include Section Graphs<br>
           <input class="mr-2" style="vertical-align: middle;" type="checkbox" id="Graphs_with_Total_Percentage_Scale_Categories" name="Graphs_with_Total_Percentage_Scale_Categories" />Include Categories Graphs</p>
    </div>
      <input type="button" name="clearGraph" value="Clear" id="clearGraph" />
      <input type="button" name="allGraph" value="Select All" id="allGraph" />
    </div>

      <hr>

      <input type="submit" class="mt-4 btn btn-sm btn-secondary" name="saveAnalysis" value="Save Analysis" id="saveAnalysis1" />
    </form>

</div>