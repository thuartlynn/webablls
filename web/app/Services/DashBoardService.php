<?php
namespace App\Services;

use Illuminate\Http\Request;
use App\User;
use App\Entites\LoginHistory_Entity;
use App\Entites\TodoList_Entity;
use App\Services\UtilsService;
use Auth;

class DashBoardService 
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $login_history;
    protected $todo;        
    protected $utils;      
    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->login_history = new LoginHistory_Entity();
        $this->todo = new TodoList_Entity();          
        $this->utils = new UtilsService();    
    }    

    /*================================== 
    * @brief: Get User History
    * @paeam_in: $id -> user id
    * @return: Contact Information
    ===================================*/    
    public function GetUserHistory($id)
    {
       $History = $this->login_history->where('user_id',$id)->orderBy('created_at', 'DESC')->get();
       $HistoryInfo = collect([]);
       $User = User::find($id);
       foreach($History as $row)
       {
          $Info = collect([]);
          $Info->put('Name',$this->utils->GetNameByFormat($User->first_name,$User->last_name));
          $Info->put('Last_Login',$this->utils->GetDateByFormat($row->created_at).' '.$row->created_at->format('H:i'));
          $HistoryInfo->push($Info);
       }       
       return $HistoryInfo;       
    }
    /*================================== 
    * @brief: Get Todo List
    * @paeam_in: $id -> user id
    * @return: Contact Information
    ===================================*/    
    public function GetTodoList($id)
    {
        $ToDoList = $this->todo->where('user_id',$id)->get();        
        if($ToDoList->isEmpty())
        {
           return $ToDoList;
        }
        else
        {
           $ToDoInfo = collect([]);
           foreach($ToDoList as $row)
           {
            $Info = collect([]);
            $Info->put('Index',$row->id);
            $Info->put('Title',$row->title);
            $Info->put('Details',$row->notes);
            $ToDoInfo->push($Info);               
           }           
           return $ToDoInfo;
           
        }

    }
    /*================================== 
    * @brief: ADD Todo List
    * @paeam_in: $id -> user id
    * @return: Contact Information
    ===================================*/    
    public function AddTodoList($id,$title,$notes)
    {
         $NewTodo = new TodoList_Entity();
         $NewTodo->user_id = $id;
         $NewTodo->title = $title;
         $NewTodo->notes = $notes;
         $NewTodo->save();
         
    }    
    /*================================== 
    * @brief: Remove Todo List
    * @paeam_in: $id -> user id
    * @return: Contact Information
    ===================================*/    
    public function RemoveTodoList($id)
    {
        $Todo = $this->todo->find($id);
        if($Todo!=null)
        {
            $Todo->delete(); 
        }
    }    
}