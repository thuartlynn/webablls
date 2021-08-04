<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Organization_Entity as Organization;
use App\Entites\Organization_BillAddress_Entity as Organization_Address;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $address_array =[];
        $org_num = 5;
        DB::table('Organization')->truncate();
        DB::table('Organization_BillAddress')->truncate();
        Organization::unguard();
        factory(Organization::class,$org_num)->create();
        Organization::unguard();
        for($i=1;$i<=$org_num;$i++)
        {
            $loop = rand(1,5);
            for($j=0;$j<=$loop;$j++)
            {
                array_push($address_array,$i); 
            }
        }        
        shuffle($address_array);           
        Organization_Address::unguard();
        foreach($address_array as $order)
        {
            $Org = Organization::find($order);
            factory(Organization_Address::class)->create(['org_id' => $order, 'name' => $Org->org_name]);
        }
        Organization_Address::unguard();

        
    }
}
