<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use App\Entites\Verified_Information_Entity as VI;
use App\Enums\Verified_Information as VI_Enum;
use App\Services\MailService;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('forgotpwd')->with('Result',collect([
            "CheckResult" => 'PANDING',
            'Message' => '',
          ]));;
    }

    public function sendResetLinkEmail(Request $request)
    {
        $User = User::where('email','=',$request->email)->first();
        if($User  == NULL)
        {
            return view('forgotpwd')->with('Result',collect([
                "CheckResult" => 'ERROR',
                'Message' => 'Account does not exist.',
              ]));;
        }
        else
        {
            $password = substr(md5(uniqid(rand(), true)),0,12);
            $Vified_Info = new VI();
            $Vified_Info->user_id = $User->user_id;
            $Vified_Info->mode = VI_Enum::EmailVilified();
            $word = 'abcdefghijkmnpqrstuvwxyz-=ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
            $len = strlen($word);
            $uuid="";
            for ($i = 0; $i < 26; $i++) 
            {
             $uuid .= $word[rand() % $len];
            }
            $Vified_Info->uuid = $uuid;
            $Vified_Info->password = $password ;
            $Vified_Info->save();            
            $User->password = Hash::make($password);
            $User->save();
            
            $Info = collect([]);
            $Info->put('email',$User->email);
            $Info->put('name',$User->first_name.' '.$User->last_name);
            $Info->put('link',url('password/reset/'.$Vified_Info->uuid));  
            $Sender = new MailService();        
            $Sender->SendRestPasswordMail($Info);       
            return view('login')->with('Result',collect([
            "CheckResult" => 'RESETPASSWORD',
            'Message' => 'Email With instructions be sent',
          ]));
        }
    }
}
