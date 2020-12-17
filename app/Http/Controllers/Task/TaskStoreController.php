<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskStoreController extends Controller
{
    /**
     * sauvegarde de la nouvelle task dans la base de données.
     * renvoie vers la liste des tasks
     * le titre est obligatoire pour créer une nouvelle task
     * les données communiquées au formulaire passent par htmlentities pour proteger le site contre les attaques XSS.
     */
    public function store(Request $request)
    {
        
        $data = Request()->validate([
            'title' => 'required'
        ]);
            
        $task = new Task();
        
        $task->user_id = Auth::id();
        $task->title = htmlentities($data['title']);
        $task->category = htmlentities($request->category);
        $task->description = htmlentities($request->description);

        $task->save();
        
        return redirect('/task');
    }

}
