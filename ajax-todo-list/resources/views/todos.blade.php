<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AJAX Todo List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100">
    <div class="max-w-2xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">My Todos</h1>

        <form id="add-form" class="mb-8 flex gap-3">
            <input
                type="text"
                id="title"
                placeholder="Add a new task..."
                class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                required
            >
            <button
                type="submit"
                class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition"
            >
                Add
            </button>
        </form>

        <ul id="todo-list" class="space-y-3">
            @foreach(\App\Models\Todo::orderBy('created_at', 'desc')->get() as $todo)
                @include('partials.todo-item')
            @endforeach
        </ul>

        <p id="empty-message" class="{{ \App\Models\Todo::count() ? 'hidden' : '' }} text-center text-gray-500 mt-8">
            No tasks yet. Add one above!
        </p>
    </div>
</body>
</html>
