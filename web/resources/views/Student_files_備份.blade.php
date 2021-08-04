<?php
   $Student["ID"] = "3";
?>

@extends('layouts.master')

@section('title', "Student Files")

@section('head')

<style>
    html, body {
        background-color: #efeeef;
        margin: 0;
        padding: 0;
    }
    body {
        height: 100vh;
    }
    .left_content {
        margin-top: 7px;
    }
    .right_top_content {
        margin-top: 10px;
        margin-left: 20px;
    }
    .right_bottom_content {
        margin-left: 20px;
    }
    .page_footer {
        margin-top: 10px;
        flex: 1;
        -webkit-flex: 1;
        -moz-flex: 1;
        -ms-flex: 1;
        -o-flex: 1;
        clear: both;
    }

    label{
            position: relative;
        }
    #fileinput{
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href="{{ asset('css/theme.default.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('/js/jquery.tablesorter.widgets.js') }}"></script>
<script src="{{ asset('/js/widget-pager.js') }}"></script>
<link href="{{ asset('css/jquery.tablesorter.pager.css') }}" rel="stylesheet">

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_files_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_files_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_files_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')

<script type="text/javascript">
    var StudentID = <?php echo ''.$Student["ID"].'' ?>;
    
    function UnLoadWindow() {
    }

    $(function () {

        var $table = $("#UserTable");
        var select = 0;
        if (<?php echo Auth::user()->date_format ?> == 0) {
                var date_format = 'mmddyyyy';
            } else {
                var date_format = 'ddmmyyyy';
            }
      
        $table.tablesorter({
            sortReset: true,
            sortRestart: true,
            dateFormat: date_format,
            textAttribute: 'data-sort',
            widgets: ["filter", "zebra", "pager"],
            widgetOptions: {
                    filter_external: '.search',
                    filter_defaultFilter: { 1: '~{query}' },
                    filter_columnFilters: false,
                    filter_saveFilters: false,
                    filter_columnAnyMatch: true,
                    filter_reset: '.reset',
                    filter_anyMatch: true,
                    // pager_size: 10,
                    pager_startPage: 0,
                    pager_savePages: false,
                    pager_fixedHeight: true,
                    pager_removeRows: false,
                    pager_output: '{startRow:input} – {endRow} / {totalRows} rows',
                    pager_updateArrows: true
            }
        });

        $("#UserTable td").click(function(event) {
            if ($(this).parent("tr").hasClass("selected")) {
                $("#UserTable tr").removeClass("selected");
                $("#actions2").addClass("disable");
            } else {
                $("#UserTable tr").removeClass("selected");
                $(this).parent("tr").addClass("selected");
                $('#actions2').removeClass("disable");
                select = $(this).parent("tr").data("table-row-id");
            }
        });

        $("#fileinput").change(function (event) {
            // console.log('test upload ajax');
            //ajax提交的話會一直重新run程式直到回傳,你可以將此行註解使用開發者工具看一下console就知道了
            event.preventDefault();

            var data = document.getElementById("fileinput").files; //檔案
            // console.log(data);
            
            var maxSize = 52428800;

            var filesize = data.size; // in bytes
            
            if (filesize>maxSize) {
                alert("File size is over 50MB! Please reduce file size.");
                return false;
            } else {
                uploadFile(event);
            }
        });

        $("#actions2 li").click(function(e) {

            if ($("#UserTable tr").not(this).hasClass("selected")) {
                if ($(this).data("path") == "downloadFile") {
                    var Url = "{{url('Student/Files')}}" + "/" + StudentID  + "?action=download";
                    var select2 = "File_ID:" + select;
                    $.ajax({
                            url: Url,
                            type: "POST",
                            data: select2,
                            cache: false,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (e) {
                                location.href="{{url('Student/Files')}}" + "/" + StudentID ;
                                // window.location.reload();
                            },
                            // error: function (jqXHR, textStatus, errorThrown) {
                            //     alert("Not success");
                            // }
                            error: function (e) {
                                alert("Not success");
                            }
                        })
                } else if ($(this).data("path") == "removeFile") {
                    answer = confirm("app.webablls.net顯示\nThis action will remove selected file permanetly. Are you sure you want to continue?");
                    if (answer) {
                    
                        var Url = "{{url('Student/Files')}}" + "/" + StudentID + "?action=remove";
                        var select2 = "File_ID:" + select;
                        $.ajax({
                            url: Url,
                            type: "POST",
                            data: select2,
                            cache: false,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (e) {
                                window.location.reload();
                            },
                            error: function (e) {
                                alert("Not success");
                            }
                        })
                    }
                } else {
                    var description = prompt("app.webablls.net顯示\nEnter description for file: ", "");  
                    if (description) {
                        
                        var Url = "{{url('Student/Files')}}" + "/" + StudentID + "?action=description";
                        var select2 = "File_ID:" + select;
                        $.ajax({
                            url: Url,
                            type: "POST",
                            data: select2 + " Description:" + description,
                            cache: false,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (e) {
                                window.location.reload();
                            },
                            error: function (e) {
                                alert("Not success");
                                console.log(description);
                            } 
                        })
                    }
                }
            }
        });
        window.onbeforeunload = UnLoadWindow;
    });
    
    uploadFile = function(event) {
        
        var data = $("#fileinput").prop('files')[0]; //取得上傳檔案的屬性
        // var uploadDate = new Date();
        // var uploadDate2 = uploadDate.toLocaleDateString();

        var formData = new FormData();
        // for(var i=0; i<data.length; i++){
        //   form.append("files:", data[i]);
        // }
        formData.append('file', data); 
        // formData.append('uploadDate', uploadDate2);
    
        $.ajax({
              type: "POST",               //使用POST傳輸,檔案上傳只能用POST
              url: "{{url('Student/Files')}}" + "/" + StudentID + "?action=upload", //3 屆時給'.$Student["ID"].'之後替換，目前為測試使用
              data: formData, //要傳輸的資料
            //   dataType: "json",
              processData: false, //防止jquery將data變成query String
              contentType: false, 
              cache: false,  //不做快取
              //async : false, 設為同步
              timeout: 1000000, //設定傳輸的timeout,時間內沒完成則中斷
              headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
              success: function (e) {

                window.location.reload();
      
              },
              error: function (e) {

                alert("Not success");
                console.log(data);

              }
        })

    }
</script>

@endsection