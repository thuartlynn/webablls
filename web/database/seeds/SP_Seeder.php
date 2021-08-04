<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Student_Parameter_Entity as StudentPara;
use App\Entites\Student_Para_Value_Entity as StudentParaValue;
use App\Entites\Organization_Entity as Organization;

class SP_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $OrgNum = Organization::all()->count();
        DB::table('Student_Parameter')->truncate();
        DB::table('Student_Para_Value')->truncate();
        StudentPara::unguard();
        StudentParaValue::unguard();
        for($i=1;$i<=$OrgNum;$i++)
        {
            $ParaValueNum = rand(1,5);
            $Total = StudentPara::count();
            for($j=1;$j<=3;$j++)
            {
              
              factory(StudentPara::class)->create(['org_id' => $i]);
              for($k=1;$k<=$ParaValueNum;$k++)
              {
               factory(StudentParaValue::class)->create(['para_id' => $Total+$j]);
              }

            }          
        }
        StudentParaValue::unguard();
    }
}
