<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $recieved_todos = Todo::all();

	    return view('index', compact('recieved_todos'));
    }

    public function create(Request $request)
    {
        $todo_data = $request->only(['todo_content']);
        Todo::create($todo_data);
        
        return redirect('/')->with('success', 'Todoを作成しました');
    }

}

