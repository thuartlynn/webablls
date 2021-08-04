<?php
  if ($Address->count() < 10) {
    echo  '<div>
            <input type="button" value="Add new address" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="Addr_add()"/>
          </div>';
  }
?>

<div id="Addr_add_part" style="margin-bottom: 80px;" class="hide">
  <form action="{{url('Organization/AddressAdd')}}" class="app-inline needs-validation" id="AddressAddfrm" method="post" role="form" novalidate>
    {{ csrf_field() }}

    <div class="app-right-bottom-mr">
      <label class="app-right-bottom-title" for="Name">Name/Company name</label>
      <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Name" name="Name" type="text" value="" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
      <div class="invalid-feedback">Name/Company name field is required</div>
    </div>

    <div class="app-right-bottom-mr">
      <label class="app-right-bottom-title" for="Street">Street</label>
      <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Street" name="Street" type="text" value="" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
      <div class="invalid-feedback">Street field is required</div>
    </div>

    <div class="app-right-bottom-mr">
      <label class="app-right-bottom-title" for="City">City</label>
      <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="City" name="City" type="text" value="" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
      <div class="invalid-feedback">City field is required</div>
    </div>

    <div class="app-right-bottom-mr">
      <label class="app-right-bottom-title" for="Zip">Zip</label>
      <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Zip" name="Zip" type="text" value="" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
      <div class="invalid-feedback">Zip field is required</div>
    </div>

    <div class="app-right-bottom-mr">
      <label class="app-right-bottom-title" for="Country">Country</label>
      <select data-default="TW" name="Country" class="custom-select app-option-font app-right-bottom-content-mr countrypicker custom-select" style="width: auto;" data-live-search="true"></select>
    </div>

    <div class="app-right-bottom-mr">
      <label class="app-right-bottom-title" for="State">State</label>
      <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="State" name="State" type="text" value="" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
      <div class="invalid-feedback">State field is required</div>
    </div>

    <div class="app-right-bottom-mr">
      <label class="app-right-bottom-title" for="PhoneNumber">Phone Number</label>
      <input class="app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="PhoneNumber" name="PhoneNumber" type="text" value="" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
      <div class="invalid-feedback">Phone Number field is required</div>
    </div>

    <input type="submit" value="Save" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
  </form>
  <input type="button" value="Cancel" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="Addr_cancel()"/>
</div>


<?php
  foreach($Address as $value) {
    $url = url('/Organization/AddressEdit');
    echo '<div id="'.$value["ID"].'">
            <form action="'.$url.'/'.$value["ID"].'" class="app-inline needs-validation" id="AddressEditfrm-Addr-'.$value["ID"].'" method="post" role="form" novalidate>';
              echo csrf_field();

    echo      '<div class="app-right-bottom-mr">
                <label class="app-right-bottom-title" for="Name">Name/Company name</label>
                <input class="disabled-item app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Name-'.$value["ID"].'" name="Name" type="text" value="'.$value["Name"].'" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
                <div class="invalid-feedback">Name/Company name field is required</div>
              </div>

              <div class="app-right-bottom-mr">
                <label class="app-right-bottom-title" for="Street">Street</label>
                <input class="disabled-item app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Street-'.$value["ID"].'" name="Street" type="text" value="'.$value["Street"].'" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
                <div class="invalid-feedback">Street field is required</div>
              </div>

              <div class="app-right-bottom-mr">
                <label class="app-right-bottom-title" for="City">City</label>
                <input class="disabled-item app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="City-'.$value["ID"].'" name="City" type="text" value="'.$value["City"].'" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
                <div class="invalid-feedback">City field is required</div>
              </div>

              <div class="app-right-bottom-mr">
                <label class="app-right-bottom-title" for="Zip">Zip</label>
                <input class="disabled-item app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="Zip-'.$value["ID"].'" name="Zip" type="text" value="'.$value["Zip"].'" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
                <div class="invalid-feedback">Zip field is required</div>
              </div>

              <div class="app-right-bottom-mr">
                <label class="app-right-bottom-title" for="Country">Country</label>
                <select data-default="'.$value["Country"].'" name="Country" class="disabled-item custom-select app-option-font app-right-bottom-content-mr selectpicker countrypicker custom-select" style="width: auto;" data-live-search="true"></select>
              </div>

              <div class="app-right-bottom-mr">
                <label class="app-right-bottom-title" for="State">State</label>
                <input class="disabled-item app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="State-'.$value["ID"].'" name="State" type="text" value="'.$value["State"].'" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
                <div class="invalid-feedback">State field is required</div>
              </div>

              <div class="app-right-bottom-mr">
                <label class="app-right-bottom-title" for="PhoneNumber">Phone Number</label>
                <input class="disabled-item app-right-bottom-input form-control app-option-font app-right-bottom-content-mr" id="PhoneNumber-'.$value["ID"].'" name="PhoneNumber" type="text" value="'.$value["Phone"].'" onchange="Checkfunc(this)" onkeyup="Checkfunc(this)" required/>
                <div class="invalid-feedback">Phone Number field is required</div>
              </div>

              <input type="submit" value="Edit" class="btn btn-sm btn-secondary app-right-bottom-mr edit" onclick="Addr_edit_save(this)"/>

            </form>
            <input type="button" value="Delete" class="btn btn-sm btn-secondary app-right-bottom-mr delete" onclick="Addr_cancel_delete(this)"/>
          </div>';
  }
?>