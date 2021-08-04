<div class="container mt-5 mb-5">
    <div class="justify-content-center align-items-center">
        <p>Dear {{$UserInfo->get('name')}}</p>
        <p>Thank you for your WebABLLS order. Your user account has been activated.<br>
           To login and complete your registration, please go to:<br>
           <a href="<?php echo env('APP_URL', 'http://localhost/login')?>" target="_blank" rel="noreferrer noopener"><?php echo env('APP_URL', 'http://localhost')?></a><br>
           Please log in using your registered email address:<br>
           {{$UserInfo->get('email')}}<br>
           Your password is:<br>
           {{$UserInfo->get('password')}}</p>
        <p>WebABLLS Support Team<br>
        <a href="mailto:William_jhuang@tecoimage.com.tw">William_jhuang@tecoimage.com.tw</a><br>
        </p>
    </div>
</div>

