<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect('/login');
        } else {
            $tasks = Task::all()->where('user_id', '=', $user->id);
            
            return view('task.index', [
                "user" => $user,
                "tasks" => $tasks,
            ]);
        }
    }
}
