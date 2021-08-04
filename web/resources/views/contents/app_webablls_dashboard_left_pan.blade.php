@inject('OrgService','App\Services\OrganizationService')
<div id="message" class="app-left-pan mb-3 pr-3 pl-3 app-disappear" style="background-color: #ffff99; border: 2px solid black; ">
  <p style="font-weight: 700; margin: 0 0 5px 0;">WebABLLS now available in English and Spanish</p>
  <p style="font-weight: 700; margin: 0 0 5px 0;"><a href="{{ url('/Announcement/Multi-language') }}" style="text-decoration:underline; color:black;">Learn more</a> about this multi-language feature</p>
  <p id="dismiss" style="margin: 0; text-align: right; text-decoration:underline; cursor: pointer;">Dismiss announcement</p>
</div>

<div class="app-left-pan pr-3 pl-3">
  <p class="app-right-bottom-h1 app-nopadding-nomargin">Hello {{$Name}}</p>
  <p class="app-nopadding-nomargin">Welcome back to WebABLLS 2.0. You last logged in {{$Last_Logged}}</p>
  <!--p style="margin: 5px 0 5px 5px;"><a target="_blank" href="http://support.webablls.net" style="text-decoration:underline; color:black; font-weight: 700;">Support Center</a></p-->
  <p style="margin: 0 0 5px 0;">Feel free to <a href="{{ url('/index_contact') }}" style="text-decoration:underline; color:black; font-weight: 700;">contact</a>  our support team for more help.</p>
  <!--p class="app-nopadding-nomargin">You can use our <a href="{{ url('/Toolkit') }}" style="text-decoration:underline; color:black; font-weight: 700;">toolkit</a> for extra content.</p-->
</div>

<?php
  use App\Enums\UserRole;
  
  if (strval(Auth::user()->role) == UserRole::Administrator()) {
    echo '<div class="app-left-pan mt-3 pr-3 pl-3">';
    echo '<p class="app-right-bottom-h1 app-nopadding-nomargin">Subscription</p>';
    if (!$OrgService->CanAddSeats()) {
      echo '<p class="app-nopadding-nomargin">Your organization has '.$Info->get('TotalSeats').' seats reserved. There are no reserved seats available.</p>';
      echo '<p style="margin: 5px 0 5px 0;">There are no extra seats available.</p>';
      echo '<p style="margin: 5px 0 5px 0;">Contact WebABLLS support to create new student.</p>';
      /*echo '<p style="margin: 5px 0 5px 0;">You can <a href="/Organization/OpenOrder" style="text-decoration:underline; color:black; font-weight: 700;">open order</a> to purchase additional seats or extend the subscription.</p>';*/
    } else {
      echo '<p class="app-nopadding-nomargin">Your organization has '.$Info->get('TotalSeats').' seats reserved. '.$Info->get('UsedSeats').' seats are available.</p>';
      echo '<p style="margin: 5px 0 5px 0;">Use this <a href="/Student/AddStudent" style="text-decoration:underline; color:black; font-weight: 700;">form</a>  to create new student.</p>';
    }
    echo '</div>';
  } /*else if (strval(Auth::user()->role) == UserRole::Standard()) {
    echo '<div class="app-left-pan mt-3 pr-3 pl-3">';
    echo '<p class="app-right-bottom-h1 app-nopadding-nomargin">Subscription</p>';
    if (!$OrgService->CanAddSeats()) {
      echo '<p class="app-nopadding-nomargin">Your organization has '.$Info->get('TotalSeats').' seats reserved. There are no reserved seats available.</p>';
      echo '<p style="margin: 5px 0 5px 0;">There are no extra seats available.</p>';
      echo '<p style="margin: 5px 0 5px 0;">Contact WebABLLS support to create new student.</p>';
    } else {
      echo '<p class="app-nopadding-nomargin">Your organization has '.$Info->get('TotalSeats').' seats reserved. '.$Info->get('UsedSeats').' seats are available.</p>';
      echo '<p style="margin: 5px 0 5px 0;">Use this <a href="/Student/AddStudent" style="text-decoration:underline; color:black; font-weight: 700;">form</a>  to create new student.</p>';
    }
    echo '</div>';
  }*/
?>

<div class="app-left-pan mt-3 pr-3 pl-3">
  <p class="app-right-bottom-h1 app-nopadding-nomargin">To-do List</p>
  <p id="add" class="app-nopadding-nomargin" style="text-decoration:underline; cursor: pointer;">+ Add item</p>
  <div id="add_item" style="margin: 5px 0 5px 0;" class="app-disappear">
    <p style="margin: 0;" class="app-right-bottom-title">Title</p>
    <input id="title" class="form-control app-left-pan-input app-option-font" type="text" value="" maxlength="20" oninput="Listener(event)"/>
    <p style="margin: 5px 0 4px 0;" class="app-right-bottom-title">Details</p>
    <textarea id="details" class="form-control rounded-0 app-option-font app-textarea app-right-bottom-content-mr" maxlength="30" oninput="Listener(event)"></textarea>
    <button id="finish" disabled class="btn btn-sm btn-secondary" style="margin: 5px 0 0 0" type="button">Add</button>
  </div>
  <div class="app-nopadding-nomargin">
    <ul id="todo" style="list-style-type: disc; margin: 0 0 5px 15px;">
      <?php
        foreach($To_Do_List as $value) {
          echo '<li class="app-nopadding-nomargin">'.$value["Title"].'<br>'.$value["Details"].'<br><p data-index="'.$value["Index"].'" onclick="clickFunction(this)" style="margin: 0; text-decoration: underline; cursor: pointer;">Remove this item</p></li>';
        }
      ?>
    </ul>
  </div>
</div>

<!--div class="app-left-pan mt-3 pr-3 pl-3">
  <p class="app-right-bottom-h1 app-nopadding-nomargin">Resources</p>
  <span class="app-nopadding-nomargin"><a style="text-decoration:underline; cursor: pointer; color:black; font-weight: 700;" href="{{URL::asset('WebABLLS_Guide.pdf')}}" download>Download WebABLLS&#153; Guide</a></span>
  <p class="app-nopadding-nomargin"><a href="{{ url('/') }}" style="text-decoration:underline; color:black; font-weight: 700;">Online ABLLS-R&#174; Guide</a></p>
  <span class="app-nopadding-nomargin"><a style="text-decoration:underline; cursor: pointer; color:black; font-weight: 700;">Navigation, Terminology & Definitions</a></span>
  <span class="app-nopadding-nomargin"><a style="text-decoration:underline; cursor: pointer; color:black; font-weight: 700;">Questions & Answers</a></span>
</div-->