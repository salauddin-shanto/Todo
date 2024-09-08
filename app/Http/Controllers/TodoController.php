<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index() {
        $todos = session()->get('todos', []);
        return view('todos.index', compact('todos'));
    }
    

    public function store(Request $request) {
        $todos = session()->get('todos', []);
        $todos[] = $request->input('todo');
        session()->put('todos', $todos);
    
        return redirect()->route('todos.index');
    }


    public function edit($id) {
        $todos = session()->get('todos', []);
        $todo = $todos[$id];
    
        return view('todos.edit', compact('todo', 'id'));
    }
    
    public function update(Request $request, $id) {
        $todos = session()->get('todos', []);
        $todos[$id] = $request->input('todo');
        session()->put('todos', $todos);
    
        return redirect()->route('todos.index');
    }

    public function destroy($id) {
        $todos = session()->get('todos', []);
        unset($todos[$id]);
        session()->put('todos', $todos);
    
        return redirect()->route('todos.index');
    }

    
    

    
}
