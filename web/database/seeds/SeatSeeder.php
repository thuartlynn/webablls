<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Organization_Entity as Organization;
use App\User;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $OrgNum = Organization::all()->count();
        $OrgList = [];     
        $ArchedCount = [];     
        for($i=1;$i<=$OrgNum;$i++)
        {
            $loop = rand(5,10);
            $num = rand(1,3);
            for($j=0;$j<$loop;$j++)
            {
                array_push($OrgList,$i); 
                if($j<$num)
                {
                    $ArchedCount[$i][$j]=1;
                }
                else
                {
                    $ArchedCount[$i][$j]=0;
                }
                shuffle($ArchedCount[$i]);
            }  
           $Org = Organization::find($i);
           $Org->totalseat = $loop;
           $Org->usedseat = $loop-$num;    
           $Org->save();       
        }
        shuffle($OrgList);
        
        DB::table('Seat')->truncate();
        Seat::unguard();
        foreach($OrgList as $order)
        {
            $user = User::where([['role','!=',0],['blocked','!=',1],['org_id','=',$order]])->get(); 
            factory(Seat::class)->create(['org_id'=> $order,'archived' =>$ArchedCount[$order][0],'coordinator'=>$user->random()->user_id]);
            unset($ArchedCount[$order][0]);
            $ArchedCount[$order] = array_values($ArchedCount[$order]);    
        }               
        Seat::unguard(); 
    }
}
