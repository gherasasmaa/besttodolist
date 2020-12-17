<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskEditController extends Controller
{
    /**
     * accès au formulaire de modification de task.
     * les anciennes données sont envoyées à la vue.
     * si l'utilisateur n'est pas authentifié, il est redirigé vers le login
     * protection contre une attaque GET via la barre d'adresse
     */
    public function edit($task_id)
    {
        $task = Task::find($task_id);
        $user = Auth::user();
        if ($user == null) {
            return redirect('login');
        } else {
            if ($task->user_id != $user->id) {
                return redirect('/task');
            } else {
                return view('task.edit', [
                    "task" => $task,
                ]);
            }
        }
    }
}
