<div class="container mt-5 mb-5">
    <div class="justify-content-center align-items-center">
        <p>Dear {{$ResetInfo->get('name')}}</p>
        <p>This message is being sent because the password reminder or password reset feature related to your WebABLLS user account was activated by your organization administrator or you.<br>
        <br>
        To set new password use link:<br>
        {{$ResetInfo->get('link')}}</p>
        <p>Contact:<br>
        <a href="mailto:William_jhuang@tecoimage.com.tw">William_jhuang@tecoimage.com.tw</a><br>
        should you need assistance.
        </p>
    </div>
</div>

