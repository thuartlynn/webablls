
<div>
  <h1 class="app-right-top-h1 app-nopadding-nomargin">Student Profile / 
  <?php
    use App\Services\UtilsService;
    $Utils = new UtilsService();
    $student_name = $Utils->GetNameByFormat($Profile->get("FirstName"), $Profile->get("LastName"));

    echo $student_name;
    echo '('.$Profile->get("ID").')';
  ?>
  </h1>
</div>

