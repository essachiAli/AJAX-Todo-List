<li
    id="todo-{{ $todo->id }}"
    class="flex items-center gap-4 bg-white p-4 rounded-lg shadow-sm transition {{ $todo->completed ? 'opacity-75' : '' }}"
>
    <input
        type="checkbox"
        data-id="{{ $todo->id }}"
        class="toggle-complete w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500"
        {{ $todo->completed ? 'checked' : '' }}
    >
    <span class="flex-1 {{ $todo->completed ? 'line-through text-gray-500' : 'text-gray-800' }}">
        {{ $todo->title }}
    </span>
    <button
        data-id="{{ $todo->id }}"
        class="delete-todo text-red-600 hover:text-red-800 font-medium text-sm"
    >
        Delete
    </button>
</li>
