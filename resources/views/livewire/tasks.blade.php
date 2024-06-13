<div class="container my-3">
    <form wire:submit.prevent="{{$id ? 'updateTask' : 'saveTask'}}">
        <div class="form-group my-2">
            <label for="title" class="form-label">Название: </label>
            <input id="title" type="text" class="form-control" wire:model="title">
            @error('title')
                <span class="text-danger my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="description" class="form-label">Описание: </label>
            <textarea id="description" class="form-control" wire:model="description"></textarea>
            @error('description')
                <span class="text-danger my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="priority" class="form-label">Приоритет: </label>
            <select id="priority" class="form-select" wire:model="priority">
                <option disabled selected>Выберите приоритет...</option>
                <option value="1">Низкий</option>
                <option value="2">Средний</option>
                <option value="3">Высокий</option>
            </select>
            @error('priority')
                <span class="text-danger my-2">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group my-2">
            <label for="deadline" class="form-label">Выполнить до: </label>
            <input id="deadline" type="datetime-local" class="form-control" wire:model="deadline">
            @error('deadline')
                <span class="text-danger my-2">{{$message}}</span>
            @enderror
        </div>

        <button class="btn btn-outline-primary my-2" type="submit">{{$id ? 'Обновить задачу' : 'Добавить задачу'}}</button>
        @if($id)
            <button wire:click="resetInputFields" class="btn btn-outline-danger" type="button">Отмена</button>
        @endif
    </form>

    <table class="table table-striped table-hover align-middle my-3">
        <thead>
            <tr class="table-info">
                <th>Название</th>
                <th class="w-50">Описание</th>
                <th>Времени осталось</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr class="{{$task->priority == 1 ? 'table-success' : ($task->priority == 2 ? 'table-warning' : 'table-danger')}}">
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                    <td><span wire:poll.500ms>{{$task->remaining_time}}</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-warning me-3" wire:click="editTask({{$task->id}})">
                            <span class="material-symbols-outlined">
                                edit
                            </span>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" wire:click="deleteTask({{$task->id}})">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- <script>
    //получение часового пояса пользователя
    document.addEventListener("livewire:load", () => {
        const timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
        @this.set("timezone", timezone);
    })
</script> --}}

