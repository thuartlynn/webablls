@extends('layouts.master')

@section('title', "Analytics List")

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
    <?php
    $userAgent = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
    if (preg_match('~MSIE|Internet Explorer~i', $userAgent) || (strpos($userAgent, 'Trident/7.0') !== false && strpos($userAgent, 'rv:11.0') !== false)) {
        echo '.page_footer {
            margin-top: 10px;
            flex-grow: 1;
            -webkit-flex-grow: 1;
            -moz-flex-grow: 1;
            -ms-flex-grow: 1;
            -o-flex-grow: 1;
            clear: both;
            background-color: #e2e2e2; 
        }';
    } else {
        echo '.page_footer {
            margin-top: 10px;
            flex: 1;
            -webkit-flex: 1;
            -moz-flex: 1;
            -ms-flex: 1;
            -o-flex: 1;
            clear: both;
            background-color: #e2e2e2; 
        }';
    }
    ?>
    #email_error_msg { 
        color: red;   
        padding:2px 5px;
    }
</style>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href="{{ asset('css/theme.default.css') }}" rel="stylesheet">
<script src="{{ asset('/js/jquery.tablesorter.js') }}"></script>
<script src="{{ asset('/js/jquery.tablesorter.widgets.js') }}"></script>
<script src="{{ asset('/js/widget-pager.js') }}"></script>
<link href="{{ asset('css/jquery.tablesorter.pager.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

@endsection

@section('header')
<div class="page_header">
    @include('contents.app_webablls_header')
</div>
@endsection

@section('left_content')
<div class="left_content">
    @include('contents.app_webablls_analysisReport_left_pan')
</div>
@endsection

@section('right_top_content')
<div class="right_top_content">
    @include('contents.app_webablls_analysisReport_right_top_content')
</div>
@endsection

@section('right_bottom_content')
<div class="right_bottom_content">
    @include('contents.app_webablls_analysisReport_right_bottom_content')
</div>
@endsection

@section('footer')
<div class="page_footer">
    @include('contents.app_webablls_footer')
</div>
@endsection

@section('script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/qtip2/3.0.3/jquery.qtip.min.js"></script>

<script type="text/javascript">

    function UnLoadWindow() {
    }

    $("#options").qtip({

        content: {
            text: '<span>The full text of Shakespeare\'s plays and sonnets side-by-side with translations into modern English.<br>No fear Shakespeare is available online and in book form at barnesandnoble.com.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
    });

    $("#section_Analysis").qtip({

        content: {
            text: '<span>This is section analysis\'s text area.<br>No content.<br>No content.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
    });

    $("#percentage_Scale").qtip({

        content: {
            text: '<span>This is section Percentage Scale\'s text area.<br>No content.<br>No content.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
    });

    $("#totalscore_Scale").qtip({

        content: {
            text: '<span>This is section Total Scores\'s text area.<br>No content.<br>No content.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
    });

    $("#totalitem_Scale").qtip({

        content: {
            text: '<span>This is section Total Items\'s text area.<br>No content.<br>No content.</span>'
        },
        show: {
            event: 'mouseover',
            ready: false
        },
        hide: {
            event: 'mouseout',
        },
        position: {
            my: 'left top',
            at: 'right center',
            target: false
        },
        style: {
            classes: 'ui-tooltip-red ui-tooltip-shadow ui-tooltip-rounded'
        }
    });
    
    window.onbeforeunload = UnLoadWindow;

</script>
@endsection