<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Contact_List_Entity as ContactList;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Organization_Entity as Organization;
use Faker\Provider\Base as FakerBase;
use Faker\Provider\Internet as FakerNet;
use Faker\Provider\en_Us\Person as FakerPerson;
use Faker\Factory as Faker;
use App\User;


class ContactListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Contact_List')->truncate();
        $AllUser = User::all();
        
        ContactList::unguard();
        foreach($AllUser as $User)
        {
            $ContactNo = FakerBase::numberBetween($min = 1 , $max = 3);
            for($i=0;$i<$ContactNo;$i++)
            {
                $Ismember = FakerBase::numberBetween($min = 0 , $max = 1);
                if($Ismember == 1)
                {
                   do
                    { 
                        $memberID = FakerBase::numberBetween($min = 1 , $max = $AllUser->count());
                    }while($memberID == $User->user_id);
                    $member= User::find($memberID);           
                    $Org = Organization::find($member->org_id);
                    factory(ContactList::class)->create(['user_id' => $User->user_id, 'org_name' => $Org->org_name, 'is_user' => $Ismember,
                                                         'member_id' => $memberID,'name' => $member->first_name.' '.$member->last_name,'email' => $member->email]);                          

                }
                else
                {                   
                   $faker = Faker::create();
                   $Name = $faker->name();
                   $Email = $faker->email();                   
                   factory(ContactList::class)->create(['user_id' => $User->user_id, 'org_name' => 'n/a', 'is_user' => $Ismember,
                   'member_id' => null ,'name' => $Name,'email' => $Email]);                                             
                }
            }                                
        }        
        ContactList::unguard();
    }
}
