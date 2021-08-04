<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Analysis_Setting_Entity as AnalysisSetting;
use App\Entites\Profile_Permission_Entity as ProfilePermission;
use App\Entites\Assessment_Record_Entity as Assessment;
use App\User;
use App\Enums\Analysis_Category;
use App\Enums\Analysis_Section;


class AnalysisSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Analysis_Setting')->truncate();
        AnalysisSetting::unguard();
        $StudentList = Seat::all();
        foreach($StudentList as $Student)
        {
            $age = round((time()-strtotime($Student->birthday))/(24*60*60)/365.25*12/3,0);            
            $Profile_Coordinator = ProfilePermission::where(['seat_id' => $Student->seat_id,'coordinator' => 1])->first();  
            $Assessment_List = Assessment::where(['seat_id'=>$Student->seat_id])->get();          
            if($Profile_Coordinator != null)
            {            
             $Ass = collect([]);
             $tempAss = rand($min = 1, $max = $Assessment_List->count());             
             while($Ass->count()< $tempAss)
             {
                $Setting = $Assessment_List[rand($min = 0, $max = $Assessment_List->count()-1)];                
                if(!array_key_exists($Setting->ass_id,$Ass))
                {
                  $Ass->put($Setting->ass_id,1);
                }
             }                  
             $Category = collect([]);
             $tempCategory = rand($min = 1, $max = 25);
             while($Category->count()< $tempCategory)
             {
                $Setting = Analysis_Category::getRandomInstance();                    
                if(!array_key_exists($Setting->key,$Category))
                {
                  $Category->put($Setting->key,$Setting->value);
                }              
             }             
             $Section = collect([]);
             $tempSection = rand($min = 1, $max = 6);
             while($Section->count()<$tempSection)
             {
                $Setting = Analysis_Section::getRandomInstance();    
                if(!array_key_exists($Setting->key,$Section))
                {
                  $Section->put($Setting->key,$Setting->value);
                }
            }  
            factory(AnalysisSetting::class)->create(['seat_id' => $Student->seat_id, 'user_id' => $Profile_Coordinator->user_id,'assessment_list' => $Ass,'section_op'=>$Section->values(),
                                                     'category_op'=>$Category->values(),'normative_age'=> $age]); 
           }
        }
        AnalysisSetting::unguard();
    }
}
