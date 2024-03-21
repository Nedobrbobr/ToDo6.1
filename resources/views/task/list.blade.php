<x-app-layout>
    <h2>Task List</h2>
    <table>
        <thead>
            <tr>
                <td>Title</td>
                <td>Description</td>
                <td>Update at</td>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->update_at }}</td>
                <td>
                    <form method="post" action="{{ route('task.complete') }}">
                        @csrf
                        <label for="complete"></label>
                        <input id="complete" name="complete" class="hidden" type="number" value="{{ $task->id }}">
                        <x-custom.button>Complete</x-custom.button>
                    </form>
                    <form method="post" action="{{ route('task.edit') }}">
                        @csrf
                        @method("put")
                        <label for="edit"></label>
                        <input id="edit" name="edit" class="hidden" type="number">
                        <x-custom.button>Edit</x-custom.button>
                    </form>
                    <form method="post" action="{{ route('task.complete') }}">
                        @csrf
                        @method("delete")
                        <label for="complete"></label>
                        <input id="complete" name="complete" class="hidden" type="number" value="{{ $task->id }}">
                        <x-custom.button>Complete</x-custom.button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex">
        <x-custom.link :route="'task.new'">New Task</x-custom.link>
        <x-custom.link :route="'task.find'">Find Task</x-custom.link>
        <x-custom.link :route="'task.completed'">Completed</x-custom.link>
    </div>
</x-app-layout>
