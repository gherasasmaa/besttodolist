<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskStoreController extends Controller
{
    public function store(Request $request)
    {
        
        $data = Request()->validate([
            'title' => 'required'
        ]);
            
        $task = new Task();
        
        $task->user_id = Auth::id();
        $task->title = $data['title'];
        $task->category = $request->category;
        $task->description = $request->description;

        $task->save();
        
        return redirect('/task');
    }

}
