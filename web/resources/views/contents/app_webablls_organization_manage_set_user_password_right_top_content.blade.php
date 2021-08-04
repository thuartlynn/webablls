<?php
  use App\Services\UtilsService;
  $Utils = new UtilsService();
  $title_name = $Utils->GetNameByFormat($User->get("FirstName"), $User->get("LastName"));
?>
<div class="app-right-top-title app-nopadding-nomargin">
  <h1 class="app-right-top-h1 app-right-top-h1-title">Set User Password / {{$title_name}} ({{$User->get('Email')}})</h1>
</div>