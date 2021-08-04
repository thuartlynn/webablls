<div id="Warning_message" class="container bg-yellow mt-3 mb-3 app-right-bottom-mr hide">
  <div class="row justify-content-center align-items-center" style="text-align: center;">
    <span id="Warning_message_text" class="mt-3 mb-3 app-nopadding-nomargin Warning-message-content">Changes have been saved</span>  
  </div>
</div>

<form action="{{url('/Organization/StudentParameter')}}" class="app-inline needs-validation" id="studentparametersfrm" method="post" role="form" novalidate>
  {{ csrf_field() }}
  <?php 
    $count = 0;

    foreach($SPData as $value) {

      if ($count == 0) {
        echo '<nav style="background-color:#d3d3d3; padding: 30px; margin-top: 10px;">';
      } else if ($count == 1) {
        echo '<nav style="background-color:#e1e5e7; padding: 30px;">';
      } else {
        echo '<nav style="background-color:#d3d3d3; padding: 30px;">';
      }

      echo '<label class="app-right-bottom-title">Is parameter active:</label>';
      echo '<div style="margin-top: -10px;">';

      if ($value['Active'] == 1) {
        echo '<input type="checkbox" name="SP['.$count.'][IsActive]" id="SP['.$count.'].IsActive" value="1" checked="checked" onclick="clickFunction(this)"/>';
      } else {
        echo '<input type="checkbox" name="SP['.$count.'][IsActive]" id="SP['.$count.'].IsActive" value="0" onclick="clickFunction(this)"/>';
      }
      echo '</div>';

      echo '<label class="app-right-bottom-title">Parameter name:</label>';
      echo '<div>';
      echo '<input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="SP['.$count.'][Name]" id="SP['.$count.'].Name" type="text" value="'.$value['Name'].'" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>';
      echo '<div class="invalid-feedback">Parameter Name field is required</div>';
      echo '</div>';

      echo '<label class="app-right-bottom-title" style="margin-top: 10px;">Is parameter required:</label>';
      echo '<div style="margin-top: -10px;">';
      if ($value['Rrquire'] == 1) {
        echo '<input type="checkbox" name="SP['.$count.'][IsRequired]" id="SP['.$count.'].IsRequired" value="1" checked="checked" onclick="clickFunction(this)"/>';
      } else {
        echo '<input type="checkbox" name="SP['.$count.'][IsRequired]" id="SP['.$count.'].IsRequired" value="0" onclick="clickFunction(this)"/>';
      }
      echo '</div>';

      echo '<label class="app-right-bottom-title">Values:</label>';
      echo '<div id="part-'.$count.'">';
      $i = 0;
      foreach($value['Value'] as $value2) {
        echo '<div style="margin-top: 10px;">
                <input value="'.$value2.'" style="display: inline;" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" name="SP['.$count.'][Values]['.$value['Value']->search($value2).']" id="SP['.$count.'].Values['.$i.']" type="text" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
                <button class="btn btn-sm btn-secondary" onclick="Remove(this)" type="button">Remove</button>
                <div class="invalid-feedback">Values field is required</div>
              </div>';
        $i++;
      }
      echo '</div>';

      echo '<div style="margin-top: 30px;">';
      echo '<input style="display: inline;" class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" type="text"/>';
      echo '<button class="btn btn-sm btn-secondary" value="part-'.$count.'" onclick="AddItem(this)" type="button">Add</button>';
      echo '</div>';
      echo '</nav>';

      $count++;
    }
  ?>
  <input type="submit" name="Save" value="Save" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>