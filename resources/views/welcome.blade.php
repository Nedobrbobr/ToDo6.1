

<x-app-layout class="antialiased">
     <h1 class="text-9xl">To Do</h1>
     <div class="flex gap-4 mb-40">
         <x-custom.link :route="'task.new'">+ New Task</x-custom.link>
         <x-custom.link :route="'task.list'">Your Tasks</x-custom.link>
         <x-custom.link :route="'task.find'">Find Task</x-custom.link>
     </div>
 </x-app-layout>
