<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskShowController extends Controller
{
    /**
     * affichage de la task avec toutes les informations par exemple la description complete de la task.
     * protection de la task par un retour au login en cas d'attaque GET via la barre d'adresse.
     */
    public function show($task_id)
    {
        $task = Task::find($task_id);
        $user = Auth::user();
        if ($user == null) {
            return redirect('login');
        } else {
            if ($task->user_id != $user->id) {
                return redirect('/task');
            } else {
                return view('task.show', [
                    "task" => $task,
                ]);
            }
        }
    }

}
