<?php
  $a = 1;
  if (!empty($_GET['a'])) {
    $a = $_GET['a'];
  }
?>

<div class="app-left-pan">
  <span class="title app-left-pan-title-mr-pd"><i class="fas fa-caret-up fa-lg mr-2"></i>Analysis Components</span>
  <nav class="navbar app-left-pan-bg app-nopadding-nomargin">
    <div class="navbar-nav app-left-pan-list-mr-pd">
      <div class="mt-2">
        <p>Use links below to access tables and graphs</p>
        <div class="app-select-list2">
          <div class="mb-2">
          <?php
            if ($a == 1) {
              echo '<span data-index="Analysis_Details" class="select mr-4">Analysis Details</span>';
            } else {
              echo '<span data-index="Analysis_Details" class="no-select mr-4">Analysis Details</span>';
            }

            if ($a == 2) {
              echo '<span data-index="Table_analysis_of_single_assessment" class="select">Table analysis of single assessment</span>';
            } else {
              echo '<span data-index="Table_analysis_of_single_assessment" class="no-select">Table analysis of single assessment</span>';
            }
          ?>
          </div>
          <div class="mb-2">
          <?php
            if ($a == 3) {
              echo '<span data-index="Section_Graphs_with_Total_Items_Scale" class="select mr-4">Section Graphs with Total Items Scale</span>';
            } else {
              echo '<span data-index="Section_Graphs_with_Total_Items_Scale" class="no-select mr-4">Section Graphs with Total Items Scale</span>';
            }

            if ($a == 4) {
              echo '<span data-index="Category_Graphs_with_Total_Items_Scale" class="select">Category Graphs with Total Items Scale</span>';
            } else {
              echo '<span data-index="Category_Graphs_with_Total_Items_Scale" class="no-select">Category Graphs with Total Items Scale</span>';
            }
          ?>
          </div>
          <div class="mb-2">
          <?php
            if ($a == 5) {
              echo '<span data-index="Section_Graphs_with_Total_Scores_Scale" class="select mr-4">Section Graphs with Total Scores Scale</span>';
            } else {
              echo '<span data-index="Section_Graphs_with_Total_Scores_Scale" class="no-select mr-4">Section Graphs with Total Scores Scale</span>';
            }

            if ($a == 6) {
              echo '<span data-index="Category_Graphs_with_Total_Scores_Scale" class="select">Category Graphs with Total Scores Scale</span>';
            } else {
              echo '<span data-index="Category_Graphs_with_Total_Scores_Scale" class="no-select">Category Graphs with Total Scores Scale</span>';
            }
          ?>
          </div>
          <div>
          <?php
            if ($a == 7) {
              echo '<span data-index="Section_Graphs_with_Percentage_Scale" class="select mr-4">Section Graphs with Percentage Scale</span>';
            } else {
              echo '<span data-index="Section_Graphs_with_Percentage_Scale" class="no-select mr-4">Section Graphs with Percentage Scale</span>';
            }

            if ($a == 8) {
              echo '<span data-index="Category_Graphs_with_Percentage_Scale" class="select">Category Graphs with Percentage Scale</span>';
            } else {
              echo '<span data-index="Category_Graphs_with_Percentage_Scale" class="no-select">Category Graphs with Percentage Scale</span>';
            }
          ?>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>

<?php
if ($a == 2) {
  include('/web/resources/views/contents/app_webablls_anaytics_table_analysis_of_single_assessment_content.blade.php');
} else if ($a == 3) {
  include('/web/resources/views/contents/app_webablls_anaytics_section_graphs_with_total_items_scale_content.blade.php');
} else if ($a == 4) {
  include('/web/resources/views/contents/app_webablls_anaytics_category_graphs_with_total_items_scale_content.blade.php');
} else if ($a == 5) {
  include('/web/resources/views/contents/app_webablls_anaytics_section_graphs_with_total_scores_scale_content.blade.php');
} else if ($a == 6) {
  include('/web/resources/views/contents/app_webablls_anaytics_category_graphs_with_total_scores_scale_content.blade.php');
} else if ($a == 7) {
  include('/web/resources/views/contents/app_webablls_anaytics_section_graphs_with_percentage_scale_content.blade.php');
} else if ($a == 8) {
  include('/web/resources/views/contents/app_webablls_anaytics_category_graphs_with_percentage_scale_content.blade.php');
} else {
  include('/web/resources/views/contents/app_webablls_anaytics_view_details_content.blade.php');
}
?>

<div>
    <button id="Change" class="btn btn-sm btn-secondary" style="margin-right: 5px;" type="button">Change Analysis Details</button>
    <button id="Download" class="btn btn-sm btn-secondary" type="button">Download DOCX Report</button>
</div>