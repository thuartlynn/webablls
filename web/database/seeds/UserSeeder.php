<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Organization_Entity as Organization;
use App\User;
use App\Enums\UserRole;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $OrgNum = Organization::all()->count();
        $AdminList= [];
        $StanderList = [];
        $RestrictedList = [];
        $BlockedList = [];    
        DB::table('User')->truncate();
        User::unguard();
        
        //Create Admin List
        for($i=1;$i<=$OrgNum;$i++)
        {
           array_push($AdminList,$i); 
        }
        shuffle($AdminList);
        //Create Stander List       
        for($i=1;$i<=$OrgNum;$i++)
        {
            $loop = 2;
            for($j=0;$j<$loop;$j++)
            {
                array_push($StanderList,$i); 
            }            
        }
        //Create Stander List       
        for($i=1;$i<=$OrgNum;$i++)
        {
            $loop = 2;
            for($j=0;$j<$loop;$j++)
            {
                array_push($RestrictedList,$i); 
            }            
        }
        shuffle($StanderList);
        //Create Block List  
        for($i=1;$i<=$OrgNum;$i++)
        {
            $loop = 2;
            for($j=0;$j<$loop;$j++)
            {
                array_push($BlockedList,$i); 
            }            
        }
        shuffle($BlockedList);
        
        foreach($AdminList as $order)
        {
            factory(User::class)->create(['org_id' => $order,'org_name' => Organization::find($order)->org_name,'role' =>UserRole::Administrator()->value,'blocked' => 0]);
        }

        foreach($StanderList as $order)
        {
            factory(User::class)->create(['org_id' => $order,'org_name' => Organization::find($order)->org_name,'role' =>UserRole::Standard()->value,'blocked' => 0]);
        }
        foreach($RestrictedList as $order)
        {
            factory(User::class)->create(['org_id' => $order,'org_name' => Organization::find($order)->org_name,'role' =>UserRole::Restricted()->value,'blocked' => 0]);
        }

        foreach($BlockedList as $order)
        {
            factory(User::class)->create(['org_id' => $order,'org_name' => Organization::find($order)->org_name,'blocked' => 1]);
        }

        User::unguard(); 
    }
}
