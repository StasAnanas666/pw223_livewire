<?php

namespace App\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class Completedtasks extends Component
{
    public $completedTasks;

    public function mount()
    {
        $this->loadCompletedTasks();
    }

    public function loadCompletedTasks()
    {
        $this->completedTasks = Task::where("completed", true)->get();
    }

    public function render()
    {
        return view('livewire.completedtasks')->layout("layouts.app");
    }
}
