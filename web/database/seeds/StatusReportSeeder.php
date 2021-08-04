<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Assessment_Record_Entity as Assessment;
use App\Entites\Assessment_Scores_Entity as AssessmentScores;
use App\Entites\Skill_Scores_Entity as Scores;
use App\Entites\Profile_Permission_Entity as ProfilePermission;
use App\Entites\Status_Report_Entity as StatusReport;
use Faker\Provider\DateTime as FakerTime;
use Faker\Provider\Base as FakerBase;
use App\User;

class StatusReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Status_Report')->truncate();
        StatusReport::unguard();
        $Assessment_List = Assessment::all();               
        foreach($Assessment_List as $Ass)
        {
           $loop = rand($min=0 , $max=2); 
            for($i=0;$i<$loop;$i++)
            {
              $items = rand($min = 10, $max =50);            
              $status=collect([]);
              $status_score = AssessmentScores::where('ass_id',$Ass->ass_id)->take($items)->get();
              foreach($status_score as $score)
              {
                  $score->scores= str_replace('"',"",$score->scores);
                  $LastScore = explode(',', substr($score->scores,1,-1));                                                
                  $LastScore_Class = array_count_values($LastScore);
                  $TotalScore = 0;
                  foreach($LastScore_Class as $Class)
                  {
                      $TotalScore=$TotalScore+$Class;
                  }
                  $status->put($score->skill_id,$TotalScore);
              }            
              $AssessDate = FakerTime::dateTimeBetween($startDate = $Ass->created_at, $endDate = 'now', $timezone = null);
              $AssignedDate = FakerTime::dateTimeBetween($startDate = $AssessDate, $endDate = 'now', $timezone = null);            
              factory(StatusReport::class)->create(['seat_id' => $Ass->seat_id, 'user_id' => $Ass->user_id,'assessment_id' => $Ass->ass_id,'created_at' =>$AssessDate,'assigned_date' =>$AssignedDate,'status' => $status]);
            }
        }
        
        StatusReport::unguard();
    }
}
