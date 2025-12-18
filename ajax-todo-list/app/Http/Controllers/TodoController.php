<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos');
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate(['title' => 'required|string|max:255']);

        $todo = Todo::create($validated);

        return response()->json([
            'todo' => $todo,
            'html' => view('partials.todo-item', compact('todo'))->render(),
        ], 201);
    }

    public function update(Request $request, Todo $todo): JsonResponse
    {
        $validated = $request->validate(['completed' => 'required|boolean']);

        $todo->update($validated);

        return response()->json(['todo' => $todo]);
    }

    public function destroy(Todo $todo): JsonResponse
    {
        $todo->delete();

        return response()->json(['id' => $todo->id]);
    }
}
