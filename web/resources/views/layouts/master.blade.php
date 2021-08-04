<?php
use Illuminate\Support\Facades\Auth;

$userAgent = htmlentities($_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8');
$IEorNot = false;
if (preg_match('~MSIE|Internet Explorer~i', $userAgent) || (strpos($userAgent, 'Trident/7.0') !== false && strpos($userAgent, 'rv:11.0') !== false)) {
  $IEorNot = true;
}
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('/js/app.js') }}"></script>

        <script src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.0.0/js/fontawesome.js"></script>
        @yield('head')
    </head>
    
    <?php
      if ($IEorNot) {
        echo  '<body data-spy="scroll">
                 <div style="display: flex;  flex-direction: column;
                   -webkit-display: flex; -webkit-flex-direction: column;
                   -ms-display: flex;  -ms-flex-direction: column;
                   -moz-display: flex;  -moz-flex-direction: column;
                   -o-display: flex;  -o-flex-direction: column;">
                 <div style=" display: flex; min-height: 100vh; flex-direction: column;
                   -webkit-display: flex; -webkit-min-height: 100vh; -webkit-flex-direction: column;
                   -ms-display: flex; -ms-min-height: 100vh; -ms-flex-direction: column;
                   -moz-display: flex; -moz-min-height: 100vh; -moz-flex-direction: column;
                   -o-display: flex; -o-min-height: 100vh; -o-flex-direction: column;">
                 <div>';
      } else {
        echo  '<body data-spy="scroll" style="display: flex; min-height: 100vh; flex-direction: column;
                -webkit-display: flex; -webkit-min-height: 100vh; -webkit-flex-direction: column;
                -ms-display: flex; -ms-min-height: 100vh; -ms-flex-direction: column;
                -moz-display: flex; -moz-min-height: 100vh; -moz-flex-direction: column;
                -o-display: flex; -o-min-height: 100vh; -o-flex-direction: column;">
                 <div>';
      }
    ?>
    <div id="app">
            @yield('header')
            @yield('top_content')
            <div class="container" style="max-width:1380px;">
                <div class="row">
                    <div class="left_content col-md-3">
                        @yield('left_content')
                    </div>
                    <div class="right_content col-md-9">
                        
                        @yield('right_top_content')
                        @yield('right_bottom_content')
                    </div>
                </div>
                @yield('bottom_content')
            </div>
        </div>
        @yield('footer')
        <?php
      if ($IEorNot) {
        echo '</div>
              </div>';
      }
    ?>
        @yield('script')
    </div>
    </body>
</html>