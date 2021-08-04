<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Assessment_Record_Entity as Assessment;
use App\Entites\Assessment_Scores_Entity as AssessmentScores;
use App\Entites\Skill_Scores_Entity as Scores;
use App\Entites\Profile_Permission_Entity as ProfilePermission;
use App\Entites\Base_Line_Report_Entity as BaseLineReport;
use Faker\Provider\DateTime as FakerTime;
use Faker\Provider\Base as FakerBase;
use App\User;


class BaseLineReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Base_Line_Report')->truncate();
        BaseLineReport::unguard();
        $Assessment_List = Assessment::all();        
        foreach($Assessment_List as $Ass)
        {
            $loop = rand($min=0 , $max=2);   
            for($i=0;$i<$loop;$i++)
            {
                $BaseLineReport=collect([]);    
                $Ass_scores = AssessmentScores::where('ass_id',$Ass->ass_id)->orderby('skill_id')->get();                
                foreach($Ass_scores as $score)
                {
                    $score->scores= str_replace(['"','[',']'],"",$score->scores);                
                    $BaseLineReport->put($score->skill_id,$score->scores);
                }           
                $createdate = FakerTime::dateTimeBetween($startDate = $Ass->created_at, $endDate = 'now', $timezone = null);
                $AssignedDate = FakerTime::dateTimeBetween($startDate = $createdate, $endDate = 'now', $timezone = null);            
                factory(BaseLineReport::class)->create(['seat_id' => $Ass->seat_id, 'user_id' => $Ass->user_id,'assessment_id' => $Ass->ass_id,'created_at' =>$createdate,'assigned_date' =>$AssignedDate,'baseline' => $BaseLineReport]);
            }    
        }        
        BaseLineReport::unguard();
    }
}
