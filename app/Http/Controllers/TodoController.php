<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function viewAdd(){
        return view('pages.add-todo');
    }

    public function add(Request $request){
        $title = $request->title;
        // kalau ga ada berarti insert 'none'
        $description = $request->description ?? 'none';
        $deadline = $request->deadline;

        Task::create([
            'title' => $title,
            'description' => $description,
            'deadline' => $deadline,
            'status' => FALSE,
        ]);

        return redirect('/');
    }
}
