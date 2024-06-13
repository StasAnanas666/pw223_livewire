<?php

namespace App\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;

class Tasks extends Component
{
    public $title, $description, $priority, $deadline;
    public $tasks;
    public $id;

    //монтирование компонента
    public function mount()
    {
        $this->tasks = Task::all();
        $this->updateRemainingTime();
    }

    public function saveTask()
    {
        $validated = $this->validate([
            "title" => "required|string|max:100",
            "description" => "required|string",
            "priority" => "required|integer",
            "deadline" => "required|date"
        ]);

        Task::create($validated);

        $this->resetInputFields();
        $this->tasks = Task::all();
        $this->updateRemainingTime();
    }

    public function editTask($id)
    {
        $task = Task::find($id);
        if ($task) {
            $this->id = $task->id;
            $this->title = $task->title;
            $this->description = $task->description;
            $this->priority = $task->priority;
            $this->deadline = $task->deadline;
        }
    }

    public function updateTask()
    {
        $validated = $this->validate([
            "title" => "required|string|max:100",
            "description" => "required|string",
            "priority" => "required|integer",
            "deadline" => "required|date"
        ]);

        if ($this->id) {
            $task = Task::find($this->id);
            $task->update($validated);
        }

        $this->resetInputFields();
        $this->tasks = Task::all();
        $this->updateRemainingTime();
    }

    public function deleteTask($id)
    {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            $this->tasks = Task::all();
        }
    }

    public function resetInputFields()
    {
        $this->title = "";
        $this->description = "";
        $this->priority = "";
        $this->deadline = "";
        $this->id = null;
    }

    public function updateRemainingTime()
    {
        foreach ($this->tasks as $task) {
            $deadline = Carbon::parse($task->deadline);
            $remaining_seconds = Carbon::now()->diffInSeconds($deadline, true);

            if ($remaining_seconds > 0) {
                $days = floor($remaining_seconds / 86400);
                $hours = floor(($remaining_seconds % 86400) / 3600);
                $minutes = floor(($remaining_seconds % 3600) / 60);
                $seconds = $remaining_seconds % 60;
                $task->remaining_time = sprintf("%d дней %02d:%02d:%02d", $days, $hours, $minutes, $seconds);
            } else {
                $task->remaining_time = "00:00:00";
            }
            // $time = Carbon::now($this->timezone);
            // echo $time;
        }
    }

    public function render()
    {
        $this->updateRemainingTime();
        return view('livewire.tasks');
    }
}
