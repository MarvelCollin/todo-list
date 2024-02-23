<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function viewTasks(){
        // ambil semua table di taks
        $tasks = Task::all();

        return view('pages.home', compact('tasks'));
    }

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

    public function viewUpdate($id){
        $tasks = Task::findOrFail($id);

        return view('pages.edit-todo', compact('tasks'));
    }

    public function update(Request $request, $id){
        $title = $request->title;
        $description = $request->description;
        $deadline = $request->deadline;
        
        if($request->has('checkbox')){
            $status = 1;
        } else {
            $status = 0;
        }
        

        Task::findOrFail($id)->update([
            'title' => $title,
            'description' => $description,
            'deadline' => $deadline,
            'status' => $status,
        ]);

        return redirect('/');
    }

    public function delete($id){
        $element = Task::findOrFail($id);

        $element->delete();
        return redirect('/');
    }
}
