<?php
namespace App\Services;

use App\User;
use App\Mail\RegisterNotificationEmail;
use App\Mail\ResetPasswordNotification;
use App\Mail\RegisterUserNotification;
use App\Mail\SendConnectMessage;
use Illuminate\Http\Request;
use Mail;

class MailService 
{
    /*================================== 
    * @brief: Send Organization Register Email
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function SendRegisterMail($Info)
    {
        Mail::to($Info->get('email'))->queue(new RegisterNotificationEmail($Info));
    }
    /*================================== 
    * @brief: Send Register Email
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function SendRestPasswordMail($Info)
    {
        Mail::to($Info->get('email'))->queue(new ResetPasswordNotification($Info));
    }       
    /*================================== 
    * @brief: Send Organization Register Email
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function SendRegisterUserMail($Info)
    {
        Mail::to($Info->get('email'))->queue(new RegisterUserNotification($Info));
    }
    /*================================== 
    * @brief: Send Contact Message Email
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function SendContactMail($Info)
    {        
        Mail::to($Info->get('email'))->queue(new SendConnectMessage($Info));
    }    

}