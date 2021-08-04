<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Profile_Permission_Entity as ProfilePermission;
use App\Entites\Seat_Entity as Seat;
use App\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seats = Seat::all()->count();        
        DB::table('Profile_Permission')->truncate();
        ProfilePermission::unguard();        
        for($i=1;$i<=$seats;$i++)
        {                                     
            factory(ProfilePermission::class)->create(['seat_id' => $i,'user_id' => Seat::find($i)->coordinator, 'owner'=> 1,'coordinator' => 1,'full_access' => 0,'basic_info'=> 0,
             'assessments_report' => 0, 'files' => 0, 'analytics' => 0]);
        }
        $seatList=[];
        for($i=1;$i<=$seats;$i++)
        {
            $loop = rand(1,2);
            for($j=0;$j<$loop;$j++)
            {
               array_push($seatList,$i);
            }
        }
        shuffle($seatList);        
        $user = User::where([['role','!=',0],['blocked','!=',1]])->get();
        foreach($seatList as $order)
        {
         factory(ProfilePermission::class)->create(['seat_id' => $order,'user_id' => $user->random()->user_id]);
        }
        ProfilePermission::unguard(); 
    }
}
