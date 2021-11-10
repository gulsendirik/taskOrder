<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    
	protected $tasks;

	public function __construct(TaskRepository $tasks)
	{
		$this->tasks = $tasks;
	}

    public function index()
    {
        $tasks = $this->tasks->getAll();
        return response()->json($tasks);
    }
  
    public function store(TaskRequest $request)
    {
        $amount = [];
        if ($request->types == 'invoice_ops')
        {
            $amount = [
                'currency' => $request->currency,
                'quantity' => $request->quantity,
            ];
            $task = $this->tasks->create([ 
                'title' => $request->title, 
                'types' => $request->types,
                'amount' => $amount
            ]);
            return response()->json($task);
        }
        else if ($request->types == 'custom_ops')
        {
            $task = $this->tasks->create([ 
                'title' => $request->title, 
                'types' => $request->types,
                'country' => $request->country,
            ]);
            return response()->json($task);
        }
        else if ($request->types == 'common_ops')
        {
            $task = $this->tasks->create([ 
                'title' => $request->title, 
                'types' => $request->types,
            ]);
            return response()->json($task);
        }
       
    }

    public function addPrerequisites(Request $request)
    {
        $id = $request->id;
        $taskId = Task::findOrFail($id); 

        $prerequisites = [];
        if($request->prerequisites2)
        {
            $prerequisites = [
                $request->prerequisites,
                $request->prerequisites2,
           ]; 
           $task = $this->tasks->update($taskId->id, [ 
               'prerequisites' => $prerequisites
           ]);
        }
        else {
            $prerequisites = [
                $request->prerequisites,
           ]; 
           $task = $this->tasks->update($taskId->id, [ 
               'prerequisites' => $prerequisites
           ]);
        }
        
        return response()->json("Successfully Added");
    }

    public function completedTasks(Request $request)
    {
        $id = $request->id;
        $taskId = Task::findOrFail($id); 
       
        $previous = Task::where('id', '<', $id)->orderBy('id','desc')->first();
        $first = Task::orderBy('id','asc')->pluck('title');
        $last = Task::orderBy('id','desc')->pluck('prerequisites');
       
        if (!empty($taskId->prerequisites[0]))
        {
            $taskDetail = Task::where('title',$taskId->prerequisites[0])->get();
            if ($taskDetail[0]->completed == false && isset($taskId->prerequisites[1]))
            {
                return $taskId->prerequisites[0] . " " . $taskId->prerequisites[1] . " tamamlanmalı";
            }
            else if ($taskDetail[0]->completed == false && isset($taskId->prerequisites[0]))
            {
                if ($taskId->title == $previous->prerequisites[0] || $first[0] == $last[0][0])
                {
                    return "Hata";
                }
                else 
                {
                    return $taskId->prerequisites[0] . " tamamlanmalı";
                }
            }
        }
        else 
        {
            return $taskId->title . " tamamlanmalı";
        }

    }

}
