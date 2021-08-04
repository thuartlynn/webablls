<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Assessment_Record_Entity as Assessment;
use App\Entites\Assessment_Scores_Entity as AssessmentScores;
use App\Entites\Skill_Scores_Entity as Scores;
use App\Entites\Profile_Permission_Entity as ProfilePermission;
use App\Entites\WorkSheet_Record_Entity as WorkSheetRecord;
use App\Entites\WorkSheet_Content_Entity as WorkSheetContent;
use App\Entites\Progress_Record_Entity as ProgressRecord;
use App\Entites\Progress_Content_Entity as ProgressContent;
use Faker\Provider\DateTime as FakerTime;
use Faker\Provider\Base as FakerBase;
use App\User;

class WorkSheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('WorkSheet_Record')->truncate();
        DB::table('WorkSheet_Content')->truncate();
        DB::table('Progress_Record')->truncate();
        DB::table('Progress_Content')->truncate();
        WorkSheetRecord::unguard();
        WorkSheetContent::unguard();
        ProgressRecord::unguard();
        ProgressContent::unguard();
        $Assessment_List = Assessment::all();
        foreach($Assessment_List as $Ass)
        {
           $loop = rand($min=0,$max=2);
           for($i=0;$i<$loop;$i++)
           {
             $totalitems = rand($min=1,$max=50);
             $AssessDate = FakerTime::dateTimeBetween($startDate = $Ass->created_at, $endDate = 'now', $timezone = null);
             $AssignedDate = FakerTime::dateTimeBetween($startDate = $AssessDate, $endDate = 'now', $timezone = null);            
             factory(WorkSheetRecord::class)->create(['seat_id' => $Ass->seat_id, 'user_id' => $Ass->user_id,'assessment_id' => $Ass->ass_id,'created_at' =>$AssessDate,'assigned_date' =>$AssignedDate,'total_items' => $totalitems,'color' => $Ass->color]);
           }
        }   
        $WorkSheetRecord_List =  WorkSheetRecord::all();        
        foreach($WorkSheetRecord_List as $Record)
        {
            $Ass_score = AssessmentScores::where('ass_id',$Record->assessment_id)->take(intval($Record->total_items))->get();                                
            foreach($Ass_score as $item)
            {
                factory(WorkSheetContent::class)->create(['worksheet_id' => $Record->id, 'skill_id' => $item->skill_id]);  
            }
            $loop = rand($min=0,$max=2);
            for($i=0;$i<$loop;$i++)
            {
                $AssessDate = FakerTime::dateTimeBetween($startDate = $Record->created_at, $endDate = 'now', $timezone = null);
                $AssignedDate = FakerTime::dateTimeBetween($startDate = $AssessDate, $endDate = 'now', $timezone = null);               
                factory(ProgressRecord::class)->create(['seat_id' => $Record->seat_id, 'user_id' => $Record->user_id,'worksheet_id' => $Record->id,'created_at' =>$AssessDate,'assigned_date' =>$AssignedDate,'total_items' => $Record->total_items,'times' => $i+1]);
            }
        }
        $ProgressRecord_List = ProgressRecord::all();
        foreach($ProgressRecord_List as $Record)
        {
            $worksheet = WorkSheetRecord::find($Record->worksheet_id);
            $Ass_score = AssessmentScores::where('ass_id',$worksheet->assessment_id)->take(intval($worksheet->total_items))->get();                                            
            foreach($Ass_score as $item)
            {
                factory(ProgressContent::class)->create(['progress_id' => $Record->id, 'skill_id' => $item->skill_id]);  
            }
        }        
        WorkSheetRecord::unguard();
        WorkSheetContent::unguard();
        ProgressRecord::unguard();
        ProgressContent::unguard();
    }
}
