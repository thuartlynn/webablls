@extends('layouts.master')

@section('title', 'test calendar')

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
    .page_header {
        top: 0;
        width: 100vw;
        z-index: 99;
    }
    .top_content {
        margin-bottom:100px;
    }
    .left_content {
    }
    .right_top_content {
    }
    .right_bottom_content {
    }
    .bottom_content {
        clear: both;
        z-index: 23;
    }
    .page_footer {
        clear: both;
        -webkit-flex: 1;
        z-index: 10;
    }
    #email_error_msg { 
        color: red;   
        padding:2px 5px;
    }
    #send_pwd_msg {
        width: 100%;
        text-align: left;
        line-height: 48px;
        color: rgb(50,150,250);
        margin: 0;
        padding: 0;
    }
</style>

<link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>

<link href="{{ asset('/css/fullcalendar.main.css') }}" rel="stylesheet">
<link href="{{ asset('/css/daygrid.main.css') }}" rel="stylesheet">
<link href="{{ asset('/css/timegrid.main.css') }}" rel="stylesheet">
<link href="{{ asset('/css/list.main.css') }}" rel="stylesheet">
<link href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css' media='screen' rel='stylesheet' type='text/css'></link>
<link href='https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css' media='screen' rel='stylesheet' type='text/css'></link>

<script src="{{ asset('/js/fullcalendar.main.js') }}"></script>
<script src="{{ asset('/js/daygrid.main.js') }}"></script>
<script src="{{ asset('/js/timegrid.main.js') }}"></script>
<script src="{{ asset('/js/list.main.js') }}"></script>
<script src="{{ asset('/js/interaction.main.js') }}"></script>
<script src="{{ asset('/js/moment.main.min.js') }}"></script>
<script src="{{ asset('/js/moment-timezone.main.min.js') }}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js'></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('test');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid', 'timeGrid', 'list', 'interaction'],
            timeZone: 'UTC',
            editable: true,
            eventLimit: true, // when too many events in a day, show the popover
            selectable: true,
            selectMirror: true,
            header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay '
            },
            firstDay: 1,
            weekMode: 'variable',
            contentHeight: 800,
            // googleCalendarApiKey: "AIzaSyBaKLAuuBWTjuZ4wme1mEUxDIEXrrLQZdY",  //串Google Calendar API
            // events: {
            //     googleCalendarId: "zh.taiwan#holiday@group.v.calendar.google.com"
            // },
            events: 'https://fullcalendar.io/demo-events.json?overload-day',
            // eventClick: function(evt) {
            //     alert(evt.title); // 點擊事件時, 顯示事件標題
            //     return false;
            // }
            
            // select: function(info) {
                
            //     alert('selected ' + info.startStr + ' to ' + info.endStr);
            // },
            dayClick: function(date, allDay, jsEvent, view) {
                var selDate =$.fullCalendar.formatDate(date,'yyyy-MM-dd');//格式化日期
                $.fancybox({//调用fancybox弹出层
                    'type':'ajax',
                    'href':'event.php?action=add&date='+selDate
                });
            }

        });
        calendar.render();
    });


    // $(function() {
    //     $('#test').fullCalendar({
    //         events: 'https://fullcalendar.io/demo-events.json?overload-day', //事件数据源
    //         dayClick: function(date, allDay, jsEvent, view) {
    //             var selDate =$.fullCalendar.formatDate(date,'yyyy-MM-dd');//格式化日期
    //             $.fancybox({//调用fancybox弹出层
    //                 'type':'ajax',
    //                 'href':'event.php?action=add&date='+selDate
    //             });
    //         }
    //     });
    // });

   
</script>

@endsection

@section('header')
<div class="page_header">
    @include('support.support_header')
</div>
@endsection

@section('top_content')
<div class="top_content">
    @include('contents.calendar')
</div>
@endsection

@section('script')

@endsection