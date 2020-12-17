<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskCreateController extends Controller
{
    //
    public function create()
    {
        $user = Auth::user();
        if ($user == null) {
            return redirect('login');
        } else {
            return view('task.create');
        }
    }
}
