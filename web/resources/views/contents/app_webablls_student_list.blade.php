<?php
  use App\Enums\UserRole;
?>

@inject('OrgService','App\Services\OrganizationService')

<?php
  if (Auth::user()->layout_format == 0) {
    echo '<div class="app-left-pan hidden">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg fa-rotate-180 mr-2"></i>Student</span>';
  } else {
    echo '<div class="app-left-pan">';
    echo '<span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Student</span>';
  }
           
    if($OrgService->CanAddSeats() && Auth::user()->role == 2) {
      echo '<ul id="addStudent" class="navbar-nav app-left-pan-list-mr-pd" style="height:24px;">';  
      echo '<li class="nav-item app-left-pan-point" data-path="/Student/AddStudent">Add Student</li>';
      echo '</ul>';
    } else {
      echo '';
    } 
?>
    <ul id="student" class="navbar-nav app-left-pan-list-mr-pd">
    <?php 
      if (Auth::user()->role == 2) {
        echo '<li class="nav-item app-left-pan-point" data-path="/Student/ViewSummary/" id="ViewSummary">Summary</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/ViewProfile/" id="ViewProfile">Profile</li>
              <li class="nav-item app-left-pan-point" data-path="/Assessment/TgvGrid/" id="TGV">Total Grid View</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Assessments/" id="SAssess">Assessments</li>
              <!--<li class="nav-item app-left-pan-point" data-path="/Student/ViewReports/">Reports</li>-->
              <li class="nav-item app-left-pan-point" data-path="/Student/ShareStudent/" id="ShareStudent">Share</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/History/" id="StudentHistory">History</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Files/" id="StudentFiles">Files</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Notes/" id="StudentNotes">Notes</li>
              <!--<li class="nav-item app-left-pan-point" data-path="/Student/AddAnalysis/">Add Analysis</li>
              <li class="nav-item app-left-pan-point" data-path="/Analysis list/View/">Analytics List</li>-->
              <li class="nav-item app-left-pan-point" data-path="/Student/AddAssess/" id="AddAssessment">Add Assessment</li>';
      } else if (Auth::user()->role == 1) {
        echo '<li class="nav-item app-left-pan-point" data-path="/Student/ViewSummary/" id="ViewSummary">Summary</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/ViewProfile/" id="ViewProfile">Profile</li>
              <li class="nav-item app-left-pan-point" data-path="/Assessment/TgvGrid/" id="TGV">Total Grid View</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Assessments/" id="SAssess">Assessments</li>
              <!--<li class="nav-item app-left-pan-point" data-path="/Student/ViewReports/">Reports</li>-->
              <li class="nav-item app-left-pan-point" data-path="/Student/ShareStudent/" id="ShareStudent">Share</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/History/" id="StudentHistory">History</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Files/" id="StudentFiles">Files</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Notes/" id="StudentNotes">Notes</li>
              <!--<li class="nav-item app-left-pan-point" data-path="/Student/AddAnalysis/">Add Analysis</li>
              <li class="nav-item app-left-pan-point" data-path="/Analysis list/View/">Analytics List</li>-->
              <li class="nav-item app-left-pan-point" data-path="/Student/AddAssess/" id="AddAssessment">Add Assessment</li>';
      } else {
        echo '<li class="nav-item app-left-pan-point" data-path="/Student/ViewSummary/" id="ViewSummary">Summary</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/ViewProfile/" id="ViewProfile">Profile</li>
              <li class="nav-item app-left-pan-point" data-path="/Assessment/TgvGrid/" id="TGV">Total Grid View</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Assessments/" id="SAssess">Assessments</li>
              <!--<li class="nav-item app-left-pan-point" data-path="/Student/ViewReports/">Reports</li>-->
              <li class="nav-item app-left-pan-point" data-path="/Student/ShareStudent/" id="ShareStudent">Share</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/History/" id="StudentHistory">History</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Files/" id="StudentFiles">Files</li>
              <li class="nav-item app-left-pan-point" data-path="/Student/Notes/" id="StudentNotes">Notes</li>
              <!--<li class="nav-item app-left-pan-point" data-path="/Student/AddAnalysis/">Add Analysis</li>
              <li class="nav-item app-left-pan-point" data-path="/Analysis list/View/">Analytics List</li>-->
              <li class="nav-item app-left-pan-point" data-path="/Student/AddAssess/" id="AddAssessment">Add Assessment</li>';
      }
    ?>
    </ul>
  </nav>

  <!-- <nav class="navbar ">
    <ul id="3" class="navbar-nav " >  
      <li class="nav-item app-left-pan-point disable" data-path="/Student/AddAssess/">Test 1</li>
    </ul>
  </nav> -->
</div>

<script type="text/javascript">
  $(function () {

    $("#student li").click(function(e) {
      if (!$(this).hasClass("app-disable") && !$(this).hasClass("app-disable2")) {
        location.href=$(this).data("path") + StudentID;
      }
    });
    $("#addStudent li").click(function(e) {
        location.href=$(this).data("path");
    });

  });
</script>