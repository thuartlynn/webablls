<div class="">
  <ul class="nav tnav-tabs" role="tablist" >
    <li class="nav-item ">
      <a class="nav-link active" data-toggle="tab" href="#analyReport1">Analysis Details</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link " data-toggle="tab" href="#analyReport2">Initial Analysis Summary</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#analyReport3">Development Analysis Summary</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#analyReport4">Section Graphs with Percentage Scale</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#analyReport5">Category Graphs with Percentage Scale</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#analyReport6">Section Graphs with Total Scores Scale</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#analyReport7">Category Graphs with Total Scores Scale</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#analyReport8">Section Graphs with Total Items Scale</a>
    </li>
    <li class="nav-item">
      <a class="nav-link " data-toggle="tab" href="#analyReport9">Category Graphs with Total Items Scale</a>
    </li>
  </ul>

  <div class="tab-content p-0 mt-4">
    <div id="analyReport1" class="container tab-pane active">@include('contents.app_webablls_analysisReport_view_content')</div>
    <div id="analyReport2" class="container tab-pane fade">@include('contents.app_webablls_table_analysis_of_single_assessment_content')</div>
    <div id="analyReport3" class="container tab-pane fade">@include('contents.app_webablls_developeAnaly_summary')</div>
    <div id="analyReport4" class="container tab-pane fade">@include('contents.app_webablls_section_graphs_percentage_scale')</div>
    <div id="analyReport5" class="container tab-pane fade">@include('contents.app_webablls_cate_graphs_percentage_scale')</div>
    <div id="analyReport6" class="container tab-pane fade">@include('contents.app_webablls_section_graphs_totalscores_scale')</div>
    <div id="analyReport7" class="container tab-pane fade">@include('contents.app_webablls_cate_graphs_totalscores_scale')</div>
    <div id="analyReport8" class="container tab-pane fade">@include('contents.app_webablls_section_graphs_totalitem_scale')</div>
    <div id="analyReport9" class="container tab-pane fade">@include('contents.app_webablls_cate_graphs_totalitem_scale')</div>
  </div>
</div>