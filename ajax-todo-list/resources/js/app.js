import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('add-form');
    const input = document.getElementById('title');
    const list = document.getElementById('todo-list');
    const emptyMsg = document.getElementById('empty-message');

    // CREATE
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const title = input.value.trim();
        if (!title) return;

        input.disabled = true;

        try {
            const res = await fetch('/todos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ title }),
            });

            const data = await res.json();
            list.insertAdjacentHTML('afterbegin', data.html);
            input.value = '';
            emptyMsg.classList.add('hidden');
        } catch (err) {
            alert('Failed to add task');
            console.error(err);
        } finally {
            input.disabled = false;
            input.focus();
        }
    });

    // UPDATE (toggle)
    list.addEventListener('change', async (e) => {
        if (!e.target.matches('.toggle-complete')) return;

        const checkbox = e.target;
        const id = checkbox.dataset.id;
        const li = document.getElementById(`todo-${id}`);

        try {
            await fetch(`/todos/${id}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ completed: checkbox.checked }),
            });

            // Optimistic UI
            li.querySelector('span').classList.toggle('line-through', checkbox.checked);
            li.querySelector('span').classList.toggle('text-gray-500', checkbox.checked);
            li.classList.toggle('opacity-75', checkbox.checked);
        } catch (err) {
            checkbox.checked = !checkbox.checked; // revert
            alert('Failed to update');
        }
    });

    // DELETE
    list.addEventListener('click', async (e) => {
        if (!e.target.matches('.delete-todo')) return;

        if (!confirm('Delete this task?')) return;

        const btn = e.target;
        const id = btn.dataset.id;
        const li = document.getElementById(`todo-${id}`);

        try {
            await fetch(`/todos/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            });

            li.remove();
            if (!list.children.length) emptyMsg.classList.remove('hidden');
        } catch (err) {
            alert('Failed to delete');
        }
    });
});
