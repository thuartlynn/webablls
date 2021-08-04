<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Http\RedirectResponse;
use Auth;
use App\Entites\Organization_Entity;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return $next($request);
          }
      
          $user = Auth::guard()->user();
      
          $now = Carbon::now();
      
          $last_seen = Carbon::parse(session()->get('LastActiveTime'));
          
          $absence = $now->diffInMinutes($last_seen);

          $org = Organization_Entity::find($user->org_id);
          $timeout = 0;
          if($org->timeout == 0)
          {
             switch($user->timeout)
             {
               case 0:
                       $timeout = 15;
                       break;
               case 1:
                       $timeout = 30;
                       break;
               case 2:
                       $timeout = 60;
                       break;
               case 3:
                       $timeout = 120;
                       break;
               case 4:
                       $timeout = 240;
                       break;
               case 5:
                       $timeout = 360;
                       break;                                                                                                                   
               case 6:
                       $timeout = 480;
                       break;                                                                                                                                          
             } 
          }
          else
          {
            switch($org->timeout)
            {
              case 1:
                      $timeout = 15;
                      break;
              case 2:
                      $timeout = 30;
                      break;
              case 3:
                      $timeout = 60;
                      break;
              case 4:
                      $timeout = 120;
                      break;
              case 5:
                      $timeout = 240;
                      break;                                                                                                                   
              case 6:
                      $timeout = 360;
                      break;         
              case 7:
                      $timeout = 480;
                      break;       
             }                     
          }
          // If user has been inactivity longer than the allowed inactivity period
          if ($absence > $timeout) {
            Auth::guard()->logout();
      
            $request->session()->invalidate();
      
            return redirect("login");
          }
      
        session()->put('LastActiveTime', Carbon::now()->format('Y-m-d H:i:s'));            
        return $next($request);
    }
}
