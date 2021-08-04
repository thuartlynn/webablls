<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Entites\Verified_Information_Entity as VI;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm($token)
    {
       
       $ResetInfo = VI::where(["uuid" => $token,"mode" => '0'])->get();                       
       if(!$ResetInfo->isEmpty())
       {
         $ResetInfo->first()->mode =1; 
         $ResetInfo->first()->save();  
        return view('reset')->with(['token'=>$token]);
       } 
       else
       {
        return view('expired_link');
       }
    }

    public function reset($token,Request $request)
    {        
        $ResetInfo = VI::where(["uuid" => $token,"mode" => '1'])->first();              
        if($ResetInfo!=null)
        {            
          $User = User::find($ResetInfo->user_id); 
          $User->password = Hash::make($request->NewPassword); 
          $User->save();
          $Verified_List = VI::where(["user_id" => $ResetInfo->user_id])->get(); 
          foreach($Verified_List as $info)
          {
            $info->delete();
          }
          return view('login')->with('Result',collect([
            "CheckResult" => 'PASSWORDSET',
            'Message' => 'New password set. Please login.',
          ]));
        } 
        else
        {
           return redirect(url("/login"));
        }       
    }
}
