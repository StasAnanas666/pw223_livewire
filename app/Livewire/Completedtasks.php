<?php

namespace App\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class Completedtasks extends Component
{
    public $completedTasks;

    public function mount() {
        $this->loadCompletedTasks();
    }

    public function loadCompletedTasks() {
        $this->completedTasks = Task::all();
    }

    public function render()
    {
        return view('livewire.completedtasks');
    }
}
