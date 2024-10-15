<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $received_todos = Todo::all();

	    return view('index', compact('received_todos'));
    }

    public function create(TodoRequest $request)
    {
        $todo_data = $request->only(['todo_content']);
        Todo::create($todo_data);
        
        return redirect('/')->with('success', 'Todoを作成しました');
    }

    public function update(TodoRequest $request)
    {
        $todo_data = $request->only(['todo_content']);
        Todo::find($request->todo_id)->update($todo_data);
        
        return redirect('/')->with('success', 'Todoを更新しました');
    }

    public function destroy(Request $request)
    {

        Todo::find($request->todo_id)->delete();
        
        return redirect('/')->with('success', 'Todoを削除しました');
    }
}

