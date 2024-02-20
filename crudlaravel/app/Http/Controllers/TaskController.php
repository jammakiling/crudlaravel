<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function deleteTask(Task $task){
        if(auth()->user()->id === $task['user_id']){
            $task->delete();
        }
        return redirect('/');
    }
   
    public function showEditScreen(Task $task){
        if(auth()->user()->id != $task['user_id']){
            return redirect('/');
        }
        return view('edit-task', ['task' => $task]);
    }

    public function updateTask(Task $task, Request $request){
        if(auth()->user()->id != $task['user_id']){
            return redirect('/');
        }

        $incomingFields = $request->validate([
            'title' =>' required',
            'body'  => ' required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
    
        $task->update($incomingFields);
        return redirect('/');
    }


    public function createTask(Request $request){
            $incomingFields = $request->validate([
                'title' => ' required',
                'body' => ' required'
            ]);
            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['body'] = strip_tags($incomingFields['body']);
            $incomingFields['user_id'] = auth()->id();
            Task::create($incomingFields);
            return redirect('/');
    }



}
