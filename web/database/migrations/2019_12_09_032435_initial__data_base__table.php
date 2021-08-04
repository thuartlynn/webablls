<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialDataBaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Organization Table
        Schema::create('Organization', function (Blueprint $table) {
            $table->bigIncrements('org_id'); 
            $table->text('org_name')->unique();
            $table->integer('type');
            $table->datetime('expiration')->nullable();
            $table->integer('totalseat');
            $table->integer('usedseat');
            $table->integer('timeout');
            $table->timestamps();
            $table->timestamp('verified_at')->nullable();
        });
        //Organization Address Table
        Schema::create('Organization_BillAddress', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('org_id');
            $table->text('name');
            $table->text('street');
            $table->text('city');
            $table->text('zipcode');
            $table->text('country');
            $table->text('state');
            $table->text('phone');
            $table->timestamps();
        });        
        //OrderInfo Table
        Schema::create('OrderInfo', function (Blueprint $table) {
            $table->bigIncrements('order_num'); 
            $table->bigInteger('org_id');
            $table->integer('extension_years');             
            $table->timestamp('subscription_date')->nullable();
            $table->timestamp('expiration_date')->nullable();
            $table->integer('subscription_seats');            
        });
        //User table
        Schema::create('User', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->integer('role');
            $table->bigInteger('org_id');
            $table->text('org_name');            
            $table->text('first_name');
            $table->text('last_name');
            $table->text('phone_number')->nullable();
            $table->text('password');
            $table->text('email')->unique();
            $table->integer('date_format');
            $table->integer('name_format');
            $table->boolean('show_help'); 
            $table->integer('timeout');
            $table->integer('assessment_editmode');
            $table->text('time_zone');
            $table->integer('layout_format');
            $table->integer('language');
            $table->boolean('blocked'); 
            $table->text('note')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->rememberToken();
        }); 
        //Blocked Information Table
        Schema::create('Blocked_Information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('blocked_id');
            $table->bigInteger('user_id');
            $table->timestamps();        
        });        
        //Seat Table
        Schema::create('Seat', function (Blueprint $table) {
            $table->bigIncrements('seat_id');
            $table->bigInteger('org_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->datetime('birthday')->nullable();
            $table->integer('gender');
            $table->integer('ethnicity')->nullable();
            $table->text('city');
            $table->text('zipcode')->nullable();
            $table->text('country')->nullable();
            $table->boolean('sign_language'); 
            $table->integer('dignostic')->nullable();
            $table->text('note')->nullable();
            $table->boolean('archived');
            $table->text('parameter_1')->nullable();
            $table->text('parameter_2')->nullable();
            $table->text('parameter_3')->nullable();
            $table->bigInteger('coordinator');
            $table->timestamps();        
        });
        //Archived Information Table
        Schema::create('Archived_Information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('seat_id');
            $table->bigInteger('archived_id');
            $table->timestamps();        
        });        
        //Profile Permission Table
        Schema::create('Profile_Permission', function (Blueprint $table) {
            $table->bigIncrements('permission_id');
            $table->bigInteger('seat_id'); 
            $table->bigInteger('user_id'); 
            $table->boolean('owner'); 
            $table->boolean('coordinator'); 
            $table->integer('full_access');
            $table->integer('basic_info');
            $table->integer('assessments_report');
            $table->integer('files');
            $table->integer('analytics');
            $table->timestamps();            
        });        
        //Contact List Table
        Schema::create('Contact_List', function (Blueprint $table) {            
            $table->bigIncrements('contact_id');
            $table->bigInteger('user_id'); 
            $table->text('org_name');
            $table->boolean('is_user');
            $table->bigInteger('member_id')->nullable();
            $table->text('name');
            $table->text('email'); 
            $table->timestamps();
        });        
        //Assessment Table
        Schema::create('Assessment_Record', function (Blueprint $table) {
            $table->bigIncrements('ass_id');
            $table->bigInteger('seat_id'); 
            $table->bigInteger('user_id');
            $table->text('color');
            $table->integer('grade_level')->nullable();
            $table->boolean('initialize');
            $table->text('notes')->nullable();
            $table->integer('pl_1')->nullable();
            $table->integer('pl_2')->nullable();
            $table->integer('pl_3')->nullable();
            $table->integer('pl_4')->nullable();
            $table->integer('pl_5')->nullable();
            $table->text('o_1')->nullable();
            $table->text('o_2')->nullable();
            $table->text('o_3')->nullable();
            $table->text('o_4')->nullable();
            $table->text('o_5')->nullable();
            $table->integer('avg_h_1')->nullable();
            $table->integer('avg_h_2')->nullable();
            $table->integer('avg_h_3')->nullable();
            $table->integer('avg_h_4')->nullable();
            $table->integer('avg_h_5')->nullable();
            $table->datetime('assigned_date')->nullable();
            $table->timestamps();              
        });        
        //Assessment Scores Table
        Schema::create('Assessment_Scores', function (Blueprint $table) {
            $table->bigIncrements('score_id');
            $table->bigInteger('ass_id'); 
            $table->bigInteger('skill_id'); 
            $table->json('scores');
            $table->timestamps();
        });                
        //Skill Note Table
        Schema::create('Skill_Note', function (Blueprint $table) {
            $table->bigIncrements('note_id'); 
            $table->bigInteger('create_id'); 
            $table->bigInteger('seat_id');                         
            $table->bigInteger('ass_id');
            $table->bigInteger('skill_id');
            $table->boolean('open'); 
            $table->text('notes');        
            $table->timestamps();
        });
        //Student Parameter Table
        Schema::create('Student_Parameter', function (Blueprint $table) {
            $table->bigIncrements('para_id');
            $table->bigInteger('org_id'); 
            $table->boolean('is_active'); 
            $table->boolean('is_require');             
            $table->text('para_name');
            $table->timestamps();
        });
        //Student Para Value Table
        Schema::create('Student_Para_Value', function (Blueprint $table) {
            $table->bigIncrements('value_id'); 
            $table->bigInteger('para_id'); 
            $table->text('value');
            $table->timestamps();
        });
        //Files Table
        Schema::create('Files', function (Blueprint $table) {
            $table->bigIncrements('file_id'); 
            $table->bigInteger('seat_id'); 
            $table->bigInteger('upload_id');
            $table->text('name');
            $table->text('description');
            $table->text('path');
            $table->timestamps();
        });
        //Skill Scores Table
        Schema::create('Skill_Scores', function (Blueprint $table) {
            $table->bigIncrements('skill_id'); 
            $table->text('tag'); 
            $table->Integer('scores');            
        });        
        //Skill Class Table
        Schema::create('Skill_Class', function (Blueprint $table) {
            $table->bigIncrements('class_id'); 
            $table->Integer('minimum'); 
            $table->Integer('max');            
        });
        //Normative Data Table
        Schema::create('Normative_Data', function (Blueprint $table) {
            $table->bigIncrements('normative_id'); 
            $table->Integer('age'); 
            $table->bigInteger('skill_id');
            $table->json('scores');            
        });
        
        //Vilified Table
        Schema::create('Verified_Information', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('user_id'); 
            $table->integer('mode');
            $table->text('uuid');
            $table->text('password');            
            $table->timestamps();
        });        
        
        //Analysis Setting Table
        Schema::create('Analysis_Setting', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('seat_id'); 
            $table->bigInteger('user_id'); 
            $table->json('assessment_list');
            $table->integer('output');
            $table->json('section_op');
            $table->json('category_op');
            $table->boolean('normative_active');
            $table->integer('normative_age');
            $table->integer('items_scale');
            $table->integer('scores_scale');
            $table->integer('percentage_scale');
            $table->datetime('assigned_date');
            $table->timestamps();
        });        
        Schema::create('WorkSheet_Record', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('seat_id'); 
            $table->bigInteger('user_id'); 
            $table->bigInteger('assessment_id');
            $table->text('color');
            $table->integer('total_items');
            $table->datetime('assigned_date')->nullable();
            $table->timestamps();
        });                
        Schema::create('WorkSheet_Content', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('worksheet_id'); 
            $table->bigInteger('skill_id'); 
            $table->text('objective')->nullable();
            $table->text('current_level')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
        Schema::create('Progress_Record', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('worksheet_id'); 
            $table->bigInteger('seat_id'); 
            $table->bigInteger('user_id'); 
            $table->integer('times');
            $table->integer('total_items');
            $table->datetime('assigned_date')->nullable();        
            $table->timestamps();
        });
        Schema::create('Progress_Content', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('progress_id'); 
            $table->bigInteger('skill_id'); 
            $table->text('previous')->nullable();
            $table->text('current_level')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
        Schema::create('Status_Report', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('seat_id');
            $table->bigInteger('user_id');
            $table->bigInteger('assessment_id');             
            $table->json('status')->nullable();
            $table->datetime('assigned_date')->nullable();        
            $table->timestamps();
        });
        Schema::create('Base_Line_Report', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->bigInteger('seat_id');
            $table->bigInteger('user_id');
            $table->bigInteger('assessment_id');             
            $table->json('baseline')->nullable();
            $table->datetime('assigned_date')->nullable();        
            $table->timestamps();
        });
        Schema::create('Login_History', function (Blueprint $table) {
            $table->bigIncrements('id');             
            $table->bigInteger('user_id');
            $table->timestamps();
        });
        Schema::create('TodoList', function (Blueprint $table) {
            $table->bigIncrements('id');             
            $table->bigInteger('user_id');
            $table->text('title');
            $table->text('notes');
            $table->timestamps();
        });
        Schema::create('StudentHistory', function (Blueprint $table) {
            $table->bigIncrements('id');             
            $table->bigInteger('seat_id');
            $table->bigInteger('user_id');            
            $table->text('description')->nullable();
            $table->timestamps();
        });                                                                                                                                                                                                                                                                                                                                        
        Schema::create('BulletinBoard', function (Blueprint $table) {
            $table->bigIncrements('id');             
            $table->bigInteger('user_id');            
            $table->text('title');
            $table->text('content')->nullable();
            $table->integer('invisible');
            $table->text('file_name')->nullable();
            $table->text('file_path')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Organization');
        Schema::dropIfExists('OrderInfo');
        Schema::dropIfExists('User');
        Schema::dropIfExists('Blocked_Information');
        Schema::dropIfExists('Seat');
        Schema::dropIfExists('Archived_Information');
        Schema::dropIfExists('Profile_Permission');
        Schema::dropIfExists('Assessment_Record');
        Schema::dropIfExists('Assessment_Scores');
        Schema::dropIfExists('Item_Note');
        Schema::dropIfExists('Student_Parameter');
        Schema::dropIfExists('Student_Para_Value');
        Schema::dropIfExists('Files');
        Schema::dropIfExists('Skill_Scores');
        Schema::dropIfExists('Skill_Class');
        Schema::dropIfExists('Normative_Data');
        Schema::dropIfExists('Verified_Information');
        Schema::dropIfExists('Analysis_Setting');
        Schema::dropIfExists('WorkSheet_Record');
        Schema::dropIfExists('WorkSheet_Contant');
        Schema::dropIfExists('Progress_Record');
        Schema::dropIfExists('Progress_Content');
        Schema::dropIfExists('Status_Report');
        Schema::dropIfExists('Base_Line_Report');
        Schema::dropIfExists('Login_History');
        Schema::dropIfExists('TodoList');        
        Schema::dropIfExists('StudentHistory');
        Schema::dropIfExists('BulletinBoard');
    }
}
