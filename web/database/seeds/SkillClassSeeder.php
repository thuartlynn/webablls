<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Skill_Class_Entity as SkillClass;
use App\Entites\Skill_Scores_Entity as SkillScores;
use App\Entites\Normative_Entity as Normative;

class SkillClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Skill=[19,27,57,27,20,29,47,49,9,20,
        15,34,12,10,6,17,29,10,7,15,
        10,7,10,30,28];
        $skill_tag = ['A','B','C','D','E','F','G','H','I','J','K','L','M',
                      'N','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $scores = [
                   //A Class 
                   2,2,4,2,4,4,2,2,2,2,
                   2,2,4,4,2,4,4,2,2,
                   //B Class
                   4,4,4,2,4,2,2,4,4,4,
                   4,4,4,4,4,4,4,4,4,4,
                   4,4,2,2,4,4,2,
                   //C Class
                   4,4,2,2,2,4,4,2,4,2,
                   2,2,4,4,4,4,4,2,2,2,
                   4,2,4,4,2,4,4,4,4,4,
                   4,2,4,2,4,4,4,4,4,2,
                   2,4,2,2,4,4,4,4,4,2,
                   4,4,2,4,2,4,4,
                   //D Class
                   4,4,4,4,4,4,2,4,2,2,
                   4,4,2,2,2,2,2,2,2,4,
                   2,2,2,2,4,4,4,
                   //E Class
                   4,2,4,2,2,2,2,2,2,2,
                   4,4,4,4,2,2,2,2,4,4,
                   //F Class
                   2,4,4,4,4,4,2,4,4,2,
                   2,2,2,4,2,2,2,2,2,2,
                   2,2,2,2,2,2,2,2,2,
                   //G Class
                   4,4,4,4,4,2,4,4,2,2,
                   2,4,4,4,4,4,4,4,4,2,
                   4,4,2,4,4,2,4,2,4,2,
                   4,2,4,2,4,2,4,2,2,2,
                   4,4,4,4,2,4,2,
                   //H Class
                   4,4,4,4,4,4,4,4,4,4,
                   4,4,4,4,4,4,4,4,4,4,
                   4,4,4,4,4,4,4,4,4,2,
                   4,4,4,4,4,4,4,4,4,2,
                   4,4,2,4,4,4,2,2,2,
                   //I Class
                   4,4,4,4,4,2,2,2,2,
                   //J Class
                   4,4,2,2,2,2,2,2,2,2,
                   2,2,2,2,2,2,2,2,2,2,
                   //K Class
                   2,2,4,4,2,4,4,4,4,4,
                   4,4,4,4,4,
                   //L Class
                   4,2,2,2,2,2,2,2,2,2,
                   4,2,2,2,2,4,2,2,2,4,
                   2,2,2,2,2,2,2,2,2,2,
                   2,4,2,4,
                   //M Class
                   4,4,4,4,4,4,2,2,2,2,
                   2,2,
                   //N Class
                   2,4,2,2,2,2,4,2,2,2,
                   //P Class
                   2,2,2,2,2,2,
                   //Q Class
                   4,4,4,4,4,4,2,2,2,4,
                   2,4,4,2,2,2,2,
                   //R Class
                   2,4,2,4,4,2,4,4,2,2,
                   2,2,2,2,2,2,2,2,4,4,
                   4,2,2,4,2,2,2,2,2,
                   //S Class
                   2,2,4,2,4,4,4,4,4,4,
                   //T Class
                   2,2,2,2,4,4,2,
                   //U Class
                   2,2,2,2,2,2,2,2,2,2,
                   4,2,2,2,2,
                   //V Class
                   2,2,2,2,2,2,2,2,2,2,
                   //W Class
                   2,2,2,2,2,2,2,
                   //X Class
                   4,4,2,2,2,2,2,2,2,2,
                   //Y Class
                   1,1,1,1,1,1,1,1,1,1,
                   1,1,1,1,1,1,1,1,1,1,
                   1,1,1,1,1,1,1,1,1,1,
                   //Z Class
                   1,1,1,1,1,1,1,1,1,1,
                   1,1,1,1,1,1,1,1,1,1,
                   1,1,1,1,1,1,1,1,
                  ];              
        $TotalValue=0; 
        //Seed Skill Class
        DB::table('Skill_Class')->truncate();
        SkillClass::unguard();
        foreach($Skill as $value)
               {
                 DB::table('Skill_Class')->insert(
                           array('minimum' => $TotalValue+1, 'max' => ($TotalValue+$value)));
               $TotalValue=$TotalValue+$value;
               }                
         SkillClass::unguard();
         //Seed Skill Scores
         DB::table('Skill_Scores')->truncate();
         SkillScores::unguard();
         $TotalValue=0;
         foreach($skill_tag as $Key=>$Name)
         {
            for($i=1;$i<$Skill[$Key]+1; $i++)
               {
                    if($TotalValue<count($scores))
                    {  
                    DB::table('Skill_Scores')->insert(
                            array('tag' => $Name.$i, 'scores' => $scores[$TotalValue]));
                    $TotalValue=$TotalValue+1;
                    }                  
                }                
         }
         SkillScores::unguard();         
         //Seed Skill Scores
         DB::table('Skill_Scores')->truncate();
         SkillScores::unguard();
         $TotalValue=0;
         foreach($skill_tag as $Key=>$Name)
         {
            for($i=1;$i<$Skill[$Key]+1; $i++)
               {
                    if($TotalValue<count($scores))
                    {  
                    DB::table('Skill_Scores')->insert(
                            array('tag' => $Name.$i, 'scores' => $scores[$TotalValue]));
                    $TotalValue=$TotalValue+1;
                    }                  
                }                
         }
         SkillScores::unguard();         

         
    }
}
