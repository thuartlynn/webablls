<ul id="error_message_1" class="app-right-bottom-title app-right-bottom-h1-mr app-disappear" style="margin: 0; color: red;">
  <li>Select valid subscription extension term</li>
</ul>

<ul id="error_message_2" class="app-right-bottom-title app-right-bottom-h1-mr app-disappear" style="margin: 0; color: red;">
  <li>Seat value required for order option selected</li>
</ul>

<form action="{{url('/Organization/OpenOrder/Create')}}" class="app-inline needs-validation" id="organizationcreateorderfrm" method="post" novalidate>
  {{ csrf_field() }}

  <div class="app-right-bottom-h1-mr">
    <p class="app-right-bottom-title" style="margin: 0;">Subscription Extension</p>
    <p class="app-right-bottom-content" style="margin: 0;">Select number of years</p>

    <select id="length" name="length" class="custom-select app-option-font" style="width: auto;" onchange="length_change();">
      <option value="0">Select length</option>
      <option value="1">Extend for 1 year</option>
      <option value="2">Extend for 2 years</option>
      <option value="3">Extend for 3 years</option>
    </select>
  </div>

  <div class="mt-3">
    <p class="app-right-bottom-title" style="margin: 0;">Extended Seats</p>
    <div>
      <p class="app-right-bottom-content" name="extended_seats" style="margin: 0; display:inline;"><?php echo $fake_extended_seats?> of <?php echo $fake_total_seats?> seats</p>
      <button id="renew" class="btn btn-sm btn-secondary ml-2" style="display:inline;" type="button" onclick="javascript:location.href='{{url('/Organization/OpenOrder/Create/Renew')}}'">Select seats to renew</button>
    </div>
  </div>

  <div class="mt-3">
    <p class="app-right-bottom-title" style="margin: 0;">Additional Seats</p>
    <p class="app-right-bottom-content" style="margin: 0;">Enter number of additional seats</p>

    <div>
      <input style="display:inline;" value="0" class="form-control app-left-pan-input app-option-font" name="additional_seats" id="additional_seats" type="text" onKeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)))" oninput="maxLengthCheck(this)"/>
      <input id="seatsnumber_add" style="vertical-align: middle; display:inline; padding: 0; line-height:25px; text-align: center; height: 25px; width: 25px;" type="button" onclick="add()" value="+">
      <input id="seatsnumber_sub" style="vertical-align: middle; display:inline; padding: 0; line-height:25px; text-align: center; height: 25px; width: 25px;" type="button" onclick="sub()" value="-">
    </div>
  </div>

  <div class="mt-3 mb-5">
    <p class="app-right-bottom-title" style="margin: 0;">Additional Seats Activation</p>
    <p class="app-right-bottom-content" style="margin: 0;">Add seats to current subscription</p>
    <div>
      <label style="margin: 0; padding: 0;" for="Add">
        <input style="vertical-align: middle;" name="Add_or_Activate" id="Add" type="radio" class="mr-1" checked="checked"/>
        <span class="app-right-bottom-content">Show all analyses</span>
      </label>
    </div>
    <p class="app-right-bottom-content" style="margin: 0;">Activate on annual activation date</p>
    <div>
      <label style="margin: 0; padding: 0;" for="Activate">
        <input style="vertical-align: middle;" name="Add_or_Activate" id="Activate" type="radio" class="mr-1" />
        <span class="app-right-bottom-content">Show only last analyses</span>
      </label>
    </div>
  </div>

  <input type="submit" id="Confirm" name="Confirm" value="Confirm" class="btn btn-sm btn-secondary app-right-bottom-mr"/>
  <input type="button" value="test" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="javascript:location.href='{{url('/Organization/OpenOrder/Summary')}}'"/>
</form>

<input type="button" value="Cancel" class="btn btn-sm btn-secondary app-right-bottom-mr" onclick="javascript:location.href='{{url('/Organization/OpenOrder')}}'"/>

<p style="margin: 0; padding: 0;" class="app-right-bottom-content mt-2">Select order options:</p>

<div class="mt-2">
  <p class="app-right-bottom-content" style="margin: 0;">1. Subscription Extension | Select number of years</p>
  <p class="app-right-bottom-content" style="margin: 0;">2. Extend eats | Click Change link to view options available based on current usage - choose one of three options</p>

  <ul class="app-right-bottom-content" style="margin: 0; list-style-type: circle;">
    <li>Extend all seats | Renews all seats associated with the organization</li>
    <li>Select students | Select by student profile; displays a list of all student profiles within the organization</li>
    <li>Input number of seats | Enter total number seats (seats in excess of eligible renewals will be calculated as 1st year seats)</li>
  </ul>

  <p class="app-right-bottom-content" style="margin: 0;">3. Additional Seats | Enter number of seats to add</p>

  <ul class="app-right-bottom-content" style="margin: 0; list-style-type: circle;">
    <li>If number of seats (above) is complete, this number will calculate automatically</li>
    <li>If purchasing ONLY additional seats, enter number here</li>
  </ul>

  <p class="app-right-bottom-content" style="margin: 0;">4. Activation of additional seats (applies to only additional 1st year subscriptions)</p>

  <ul class="app-right-bottom-content" style="margin: 0; list-style-type: circle;">
    <li>Activate now | Add seats to current subscription</li>
    <li>Delay activation | Activate seat(s) on annual subscription date</li>
  </ul>

  <ul class="app-right-bottom-content" style="padding-left: 18px;" style="margin: 0;">
    <li>Click Confirm to return to the Create Order screen to proceed with order</li>
    <li>Click Cancel to remove values and return to the Create Order screen</li>
    <li>Confirm Order to move to the Order Summary screen</li>
  </ul>
</div>