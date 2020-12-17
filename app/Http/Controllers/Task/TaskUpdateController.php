<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskUpdateController extends Controller
{
    /**
     * mise à jour de la task dans la base de données.
     * renvoie vers l'affichage de la task
     * le titre reste obligatoire
     * les données communiquées au formulaire passent par htmlentities pour proteger le site contre les attaques XSS.
     */
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
                
                $task->title = htmlentities($data['title']);
                $task->category = htmlentities($request->category);
                $task->description = htmlentities($request->description);

                $task->save();

                return view('task.show', [
                    "task" => $task,
                ]);
            }
        }
    }

}
