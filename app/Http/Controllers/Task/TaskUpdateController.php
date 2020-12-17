<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskUpdateController extends Controller
{
    public function update($task_id, Request $request)
    {
        $task = Task::find($task_id);
        $user = Auth::user();
        if ($user == null) {
            return redirect('login');
        } else {
            if ($task->user_id != $user->id) {
                return redirect('/task');
            } else {
                $data = Request()->validate([
                    'title' => 'required'
                ]);
                
                $task->title = $data['title'];
                $task->category = $request->category;
                $task->description = $request->description;

                $task->save();

                return view('task.show', [
                    "task" => $task,
                ]);
            }
        }
    }

}
