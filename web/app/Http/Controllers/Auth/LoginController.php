<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Entites\LoginHistory_Entity;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/Dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /*================================== 
    * @brief: Display Login main screend
    * @paeam_in: 
    * @return: redirect loging view.
    ===================================*/ 
    //Longin Main Screen
    public function showLoginForm()
    {
       return view('login')->with('Result',collect([
        "CheckResult" => 'PANDING',
        'Message' => '',
      ]));
    }    
    /*================================== 
    * @brief: Handle Login faile 
    * @paeam_in: $request -> Http Request                 
    * @return: redirect to login .
    ===================================*/     
    protected function sendFailedLoginResponse(Request $request)
    {
        return view('login')->with('Result',collect([
            "CheckResult" => 'ERROR',
            'Message' => trans('auth.failed'),
          ]));
    }
     /*================================== 
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     ==================================*/
    protected function authenticated(Request $request, $user)
    {
      if($user->blocked ==1)
      {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return view('login')->with('Result',collect([
          "CheckResult" => 'ERROR',
          'Message' => 'Blocked User',
        ]));
      }
      $Login = new LoginHistory_Entity();
      $Login->user_id = $user->user_id;
      $Login->save();
      session()->put('LastActiveTime', Carbon::now()->format('Y-m-d H:i:s'));
    }
     /**
     * Logout trait
     *
     * @author Yugo <dedy.yugo.purwanto@gmail.com>
     * @param  Request $request
     * @return void         
     */
    protected function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/login');
    }    

}
