<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskDestroyController extends Controller
{
    /**
     * suppression définitive de la task de la base de données.
     * redirection vers la liste des tasks
     */
    public function destroy($task_id)
    {
        $task = Task::find($task_id);
        $user = Auth::user();
        if ($user == null) {
            return redirect('login');
        } else {
            if ($task->user_id != $user->id) {
                return redirect('/task');
            } else {

                $task->delete();

                return redirect('/task');
            }
        }
    }

}
