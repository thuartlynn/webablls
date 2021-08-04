<form action="{{url('/Organization/OpenOrder/Create/Renew')}}" class="app-inline needs-validation" id="organizationreneworderfrm" method="post" novalidate>
  {{ csrf_field() }}

  <div class="mt-1 mb-1">
    <div>
      <label style="margin: 0; padding: 0;" for="all">
        <input style="vertical-align: middle;" name="create_extension_order_options" id="all" type="radio" class="mr-1" checked="checked"/>
        <span class="app-right-bottom-content">Extend all seats</span>
      </label>
    </div>

    <div>
      <label style="margin: 0; padding: 0;" for="select_students">
        <input style="vertical-align: middle;" name="create_extension_order_options" id="select_students" type="radio" class="mr-1" />
        <span class="app-right-bottom-content">Select students</span>
      </label>
    </div>

    <div id="students" class="app-disappear">
      <?php
        foreach($Students as $value) {
          if (Auth::user()->name_format == 0) {
            $name = $value["LastName"]." ".$value["FirstName"]." "."(".$value["ID"].")";
          } else {
            $name = $value["FirstName"]." ".$value["LastName"]." "."(".$value["ID"].")";
          }
          echo '<div>';
            echo '<label style="display: inline;" for="'.$value["ID"].'"><input class="mr-1" style="vertical-align: middle;" type="checkbox" id="'.$value["ID"].'" name="'.$value["ID"].'" /><span class="app-right-bottom-content">'.$name.'</span></label>';
          echo '</div>';
        }
      ?>
    </div>

    <div>
      <label style="margin: 0; padding: 0;" for="input_number">
        <input style="vertical-align: middle;" name="create_extension_order_options" id="input_number" type="radio" class="mr-1" />
        <span class="app-right-bottom-content">Input number of seats</span>
      </label>
    </div>

    <div id="seats" class="app-disappear">
      <p class="app-right-bottom-title" style="margin: 0;">Seat number</p>
      <input value="0" class="app-right-bottom-input form-control app-option-font" name="seats_number" id="seats_number" type="text" onKeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)))" oninput="valueCheck(this)"/>
    </div>
  </div>

  <input type="submit" id="Confirm" name="Confirm" value="Confirm" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
</form>

<input type="button" value="Cancel" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="javascript:location.href='{{url('/Organization/OpenOrder/Create')}}'"/>
