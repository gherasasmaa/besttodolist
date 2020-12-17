<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskDeleteController extends Controller
{
    //
    public function delete($task_id)
    {
        $task = Task::find($task_id);
        $user = Auth::user();
        if ($user == null) {
            return redirect('login');
        } else {
            if ($task->user_id != $user->id) {
                return redirect('/task');
            } else {
                return view('task.delete', [
                    "task" => $task,
                ]);
            }
        }
    }
}
