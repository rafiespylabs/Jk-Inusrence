<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class KanbanBoard extends Component
{
    public $tasks;

    public function mount()
    {
        $this->tasks = [
            'To Do' => Task::where('status', 'To Do')->get(),
            'In Progress' => Task::where('status', 'In Progress')->get(),
            'Done' => Task::where('status', 'Done')->get(),
        ];
    }

    public function updateTaskStatus($taskId, $newStatus)
    {
        $task = Task::findOrFail($taskId);
        $task->update(['status' => $newStatus]);

        $this->mount(); // Refresh the task lists
    }

    public function render()
    {
        return view('livewire.kanban-board');
    }
}