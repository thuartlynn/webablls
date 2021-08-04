
<div style="margin: 0; padding: 0;" class="mt-3">
  <table id="Order_Table_1" class="tablesorter" style="width: 100%;">
    <thead >
      <tr style="text-align: center;">
        <th class="app-right-bottom-content" style="color: gray; border: 2px solid #bbb; background-color: #d3d3d3!important;">Item</th>
        <th class="app-right-bottom-content" style="color: gray; border: 2px solid #bbb; background-color: #d3d3d3!important;">Price (USD)</th>
      </tr>
    </thead>

    <tbody>
      <?php
        $count = 1;
        foreach($FakeOrderTable as $value) {
          echo '<tr>';
            if ($count != sizeof($FakeOrderTable)) {
              echo '<td class="app-right-bottom-content" style="border: 2px solid #bbb; background-color: #efeeef!important;">'.$value["Item"].'</td>';
              echo '<td class="app-right-bottom-content" style="border: 2px solid #bbb; background-color: #efeeef!important; text-align: right;">'.$value["Price"].'</td>';
            } else {
              echo '<td class="app-right-bottom-content" style="font-weight:700; border: 2px solid #bbb; background-color: #efeeef!important; text-align: right;">'.$value["Item"].'</td>';
              echo '<td class="app-right-bottom-content" style="border: 2px solid #bbb; background-color: #efeeef!important; text-align: right;">'.$value["Price"].'</td>';
            }
          echo '</tr>';
          $count++;
        }
      ?>
    </tbody>
  </table>
</div>

<div style="margin: 0; padding: 0;" class="mt-3">
  <table id="Order_Table_2" class="tablesorter" style="width: 100%;">
    <thead >
      <tr style="text-align: center;">
        <th class="app-right-bottom-content" style="color: gray; border: 2px solid #bbb; background-color: #d3d3d3!important;">New Subscription Start Date</th>
        <th class="app-right-bottom-content" style="color: gray; border: 2px solid #bbb; background-color: #d3d3d3!important;">New Subscription End Date</th>
        <th class="app-right-bottom-content" style="color: gray; border: 2px solid #bbb; background-color: #d3d3d3!important;">New Subscription Seat Count</th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td class="app-right-bottom-content" style="border: 2px solid #bbb; background-color: #efeeef!important; text-align: center;">{{$Fake_Start_Date}}</td>
        <td class="app-right-bottom-content" style="border: 2px solid #bbb; background-color: #efeeef!important; text-align: center;">{{$Fake_End_Date}}</td>
        <td class="app-right-bottom-content" style="border: 2px solid #bbb; background-color: #efeeef!important; text-align: center;">{{$Fake_Seat_Count}}</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="mt-3">
  <p class="app-right-bottom-title" style="margin: 0; display: inline;">Promotion code:</p>
  <input style="display: inline;" class="form-control app-left-pan-input app-option-font" name="promotion_code" id="promotion_code" type="text"/>
  <button style="margin-top:4px;" class="btn tis-btn-xs btn-secondary" type="button">Submit Promotion Code</button>
</div>

<div class="mt-3">
  <p class="app-right-bottom-content" style="margin: 0; display: inline;">Select Extension Options - return to the Extension Order screen and make any necessary revisions</p>
  <div class="mt-1">
    <button class="btn btn-sm btn-secondary" type="button" onclick="javascript:location.href='{{url('/Organization/OpenOrder/Create')}}'">Select Extension Options</button>
  </div>
</div>

<div class="mt-3">
  <p class="app-right-bottom-content" style="margin: 0; display: inline;">Confirm Order - proceed to checkout</p>
  <div class="mt-1">
    <button class="btn btn-sm btn-secondary" type="button">Confirm Order</button>
  </div>
</div>

<div class="mt-3">
  <p class="app-right-bottom-content" style="margin: 0; display: inline;">Preview Summary - download the PDF version of summary for this order</p>
  <div class="mt-1">
    <button class="btn btn-sm btn-secondary" type="button">Preview Summary</button>
  </div>
</div>

<div class="mt-3">
  <p class="app-right-bottom-content" style="margin: 0; display: inline;">Cancel Order - remove the entire order and return to the Organization Details screen</p>
  <div class="mt-1">
    <button class="btn btn-sm btn-secondary" type="button" onclick="javascript:location.href='{{url('/Organization/View')}}'">Cancel Order</button>
  </div>
</div>