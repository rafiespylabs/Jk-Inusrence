<div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($this->tasks as $status => $statusTasks)
            <div class="bg-gray-100 p-4 rounded">
                <h2 class="text-lg font-semibold">{{ $status }}</h2>
                <ul>
                    @foreach ($statusTasks as $task)
                        <li 
                            class="bg-white p-2 rounded mb-2" 
                            draggable="true" 
                            ondragstart="drag(event)" 
                            ondragenter="dragenter(event)" 
                            ondragover="dragover(event)" 
                            ondrop="drop(event)" 
                        >
                            {{ $task->title }}
                            <button wire:click="updateTaskStatus({{ $task->id }}, 'In Progress')">In Progress</button> 
                            <button wire:click="updateTaskStatus({{ $task->id }}, 'Done')">Done</button> 
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>

<script>
    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }

    function dragover(ev) {
        ev.preventDefault();
    }
</script>