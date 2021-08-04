<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Archived_Information_Entity as ArchivedInfo;
use App\Entites\Blocked_Information_Entity as BlockedInfo;
use App\User;
use Faker\Provider\DateTime as FakerTime;
use Faker\Provider\Base as FakerBase;


class ArchivedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Archived_Information')->truncate();
        $Archived_Student = Seat::all()->where('archived',1);
        ArchivedInfo::unguard();

        foreach($Archived_Student as $Info)
        {
            $uid = User::where(['blocked' => 0 , 'role' => 2, 'org_id' => $Info->org_id])->first();  
            factory(ArchivedInfo::class)->create(['seat_id' => $Info->seat_id, 'archived_id' => $uid->user_id]);
        }
        ArchivedInfo::unguard(); 

        DB::table('Blocked_Information')->truncate();
        $Blocked_User = User::where('blocked',1)->get();
        
        BlockedInfo::unguard();
        foreach($Blocked_User as $Info)
        {
            $uid = User::where(['blocked' => 0 , 'role' => 2, 'org_id' => $Info->org_id])->first();  
            factory(BlockedInfo::class)->create(['blocked_id' => $Info->user_id , 'user_id' => $uid->user_id]);
        }
        BlockedInfo::unguard(); 

    }
}
