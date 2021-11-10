<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskRepository 
{
	
	public function getAll()
	{
		return Task::all();
	}

    public function create(Array $attributes)
	{
		return Task::create($attributes);
	}

    public function getCompletedTask()
    {
       // return Task::completed(1)->get();
    }
	
	public function update(int $id, array $attributes)
	{
		$id = Task::findOrFail($id);
        return $id->update($attributes);
	}

	
}