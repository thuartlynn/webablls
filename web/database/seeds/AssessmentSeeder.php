<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Assessment_Record_Entity as Assessment;
use App\Entites\Assessment_Scores_Entity as AssessmentScores;
use App\Entites\Skill_Scores_Entity as Scores;
use App\Entites\Profile_Permission_Entity as ProfilePermission;
use Faker\Provider\DateTime as FakerTime;
use Faker\Provider\Base as FakerBase;
use App\User;


class AssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
       $colorpalette = array("#000000", "#444444", "#666666", "#999999", "#cccccc", "#eeeeee", "#f3f3f3", "#ffffff", "#ff0000", "#ff9900", "#ffff00", "#00ff00", "#00ffff", "#0000ff", "#9900ff", "#ff00ff", 
       "#fc4444", "#fce5cd", "#fff2cc", "#d9ead3", "#d0e0e3", "#cfe2f3", "#d9d2e9", "#ead1dc", "#ea9999", "#f9cb9c", "#ffe599", "#b6d7a8", "#a2c4c9", "#9fc5e8", "#b4a7d6", "#d5a6bd", 
       "#e06666", "#f6b26b", "#ffd966", "#93c47d", "#76a5af", "#6fa8dc", "#8e7cc3", "#c27ba0", "#cc0000", "#e69138", "#f1c232", "#6aa84f", "#45818e", "#3d85c6", "#674ea7", "#a64d79", 
       "#990000", "#b45f06", "#bf9000", "#38761d", "#134f5c", "#0b5394", "#351c75", "#741b47", "#660000", "#783f04", "#7f6000", "#274e13", "#0c343d", "#073763", "#20124d", "#4c1130");    
  
        DB::table('Assessment_Record')->truncate();
        DB::table('Assessment_Scores')->truncate(); 
        $Student = Seat::all();                
        //Initial Assessment
        Assessment::unguard();
        foreach($Student as $Seat)
        {            
            $Users = ProfilePermission::whereraw('seat_id = '.$Seat->seat_id.' and (owner = 1 or coordinator = 1)')->get();  
            $uid = $Users[rand($min = 0 , $max = ($Users->count()-1))]->user_id;
            $AssessDate = FakerTime::dateTimeBetween($startDate = $Seat->created_at, $endDate = 'now', $timezone = null);
            $AssignedDate = FakerTime::dateTimeBetween($startDate = $AssessDate, $endDate = 'now', $timezone = null);
            $color = array_rand($colorpalette,1);
            factory(Assessment::class)->create(['seat_id' => $Seat->seat_id, 'user_id' => $uid,'initialize' => 1, 'created_at' =>$AssessDate,'assigned_date' =>$AssignedDate,'color'=>$colorpalette[$color]]);
        }
        Assessment::unguard(); 
        $Assessment_Initial = Assessment::all();        
        $ScoresInfo = Scores::all()->shuffle();        
        //Fill Scores for Assessment
        AssessmentScores::unguard();
        foreach($Assessment_Initial as $Ass)
        {
             $Index = 0;
             foreach($ScoresInfo as $ScoreLabel)
             {
                // $Record = collect([]);                
                if($Index <=150)
                {
                   $Score = FakerBase::numberBetween($min = 1 , $max = $ScoreLabel->scores);                                
                   $Index++;
                   factory(AssessmentScores::class)->create(['ass_id' => $Ass->ass_id, 'skill_id' => $ScoreLabel->skill_id, 'scores' => $Score]);                          
                }                
             }
        }
        AssessmentScores::unguard();        
        //Second Assessment
        for($i=0;$i<4;$i++)
        {
        Assessment::unguard();        
        foreach($Student as $Seat)
        {
            $Assessment = Assessment::all()->where('ass_id','>',($Student->count()*$i))->where('seat_id','=',$Seat->seat_id);                       
            $Users = ProfilePermission::whereraw('seat_id = '.$Seat->seat_id.' and (owner = 1 or coordinator = 1)')->get();            
            $uid = $Users[rand($min = 0 , $max = ($Users->count()-1))]->user_id;
            $AssessDate = FakerTime::dateTimeBetween($startDate = $Assessment->first()->created_at, $endDate = 'now', $timezone = null);
            $AssignedDate = FakerTime::dateTimeBetween($startDate = $AssessDate, $endDate = 'now', $timezone = null);
            $getColor=false;
            do{
                $j=0;
                $color = array_rand($colorpalette,1);
                foreach($Assessment as $Used)
                {
                  if($Used->color != $colorpalette[$color])
                    {
                     $j++;
                    }
                } 
                if($j== $Assessment->count())
                  {
                    $getColor=true;
                  }
              }while($getColor==false);
            
            factory(Assessment::class)->create(['seat_id' => $Seat->seat_id,'user_id' => $uid, 'initialize' => 0, 'created_at' =>$AssessDate,'assigned_date' =>$AssignedDate,'color'=>$colorpalette[$color]]);
        }
        Assessment::unguard(); 
       
        $Assessment = Assessment::all()->where('ass_id','>',$Student->count()*($i+1));                
        $ScoresInfo = Scores::all()->shuffle();        
        //Fill Scores for Assessment
        AssessmentScores::unguard();
        foreach($Assessment as $Ass)
        {             
             $Index = 1;
             foreach($ScoresInfo as $ScoreLabel)
             {
                $Record = collect([]);                
                $LastRecord = AssessmentScores::where(['ass_id' => $Ass->ass_id - $Student->count()*($i+1),'skill_id' => $ScoreLabel->skill_id])->first();
                if($LastRecord==null)
                  {
                    $minScore=1;
                  }
                else
                {
                  $minScore=$LastRecord->scores;
                }  
                if($Index <=rand($min = 25 , $max = 100))
                {
                  if($minScore < $ScoreLabel->scores)  
                  {
                    $Score = FakerBase::numberBetween($min = $minScore , $max = $ScoreLabel->scores);                    
                    factory(AssessmentScores::class)->create(['ass_id' => $Ass->ass_id, 'skill_id' => $ScoreLabel->skill_id, 'scores' => $Score ]);
                  }
                   $Index++;                                      
                }
                else
                {
                   break;
                }                
             }
        }
        AssessmentScores::unguard();  
      }   
    }
}
