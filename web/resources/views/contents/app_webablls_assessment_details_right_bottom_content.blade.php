<?php
  use App\Enums\Grade_Level as Grade_Level;
?>
<div>
  <div>
    <label class="app-right-bottom-title" for="Student_Age">Student Age (years):</label>
    <p style="color: gray;" class="app-right-bottom-content app-right-bottom-content-2-mr">{{$Ass_Detail->get('Student_Age')}}</p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Assessment_Date">Assessment Date</label>
    <p style="color: gray;" class="app-right-bottom-content app-right-bottom-content-2-mr">{{$Ass_Detail->get('Assessment_Date')}}</p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title" for="Grade_Level">Grade Level</label>
    <p style="color: gray;" class="app-right-bottom-content app-right-bottom-content-2-mr">{{Grade_Level::getDescription(Grade_Level::getValue(Grade_Level::getKey($Ass_Detail->get('Grade_Level'))))}}</p>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title app-nopadding-nomargin" for="Color">Color</label>
    <label class="app-right-bottom-content" style="display: inline-block;" for="Color"><span style="margin-right: 10px; vertical-align: middle; width: 20px; height: 20px; border: 1px solid black; display: inline-block; background-color:{{$Ass_Detail->get('Color')}}";></span> <span style="color: gray; vertical-align: middle;">Code:{{$Ass_Detail->get('Color')}}</span></label>
  </div>

  <div class="app-right-bottom-mr">
    <label class="app-right-bottom-title app-nopadding-nomargin" for="Used_Color">Used Color</label>
    <?php
      foreach($Ass_Detail->get('Used_Color') as $value) {
        echo '<label class="app-right-bottom-content" style="display: inline-block;" for="Color"><span style="margin-right: 10px; vertical-align: middle; width: 20px; height: 20px; border: 1px solid black; display: inline-block; background-color:'.$value.'";></span></label>';
      }
    ?>
  </div>
</div>