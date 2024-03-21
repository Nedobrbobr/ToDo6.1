<x-app-layout>

    <form method="post" action="{{ route('task.create') }}" class="flex flex-col w=1/2 gap-2">
        @csrf
        <label for="title">Title</label>
        <textarea id="title" type="text" required maxlength="50" name="title" class="rounded-lg h-10"></textarea>
        <label for="description">Description</label>
        <textarea id="description" type="text" maxlength="255" name="description" rows="5" class="rounded-lg"></textarea>
        <div class="flex gap-4">
            <x-custom.button>Create</x-custom.button>
            <x-custom.link :route="'task.list'">Your Tasks</x-custom.link>
        </div>
    </form>
</x-app-layout>
