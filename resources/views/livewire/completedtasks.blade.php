<div class="container my-3">
    <h1 class="mb-5">Завершенные задачи</h1>

    <table class="table table-striped table-hover align-middle my-3">
        <thead>
            <tr class="table-info">
                <th>Название</th>
                <th class="w-75">Описание</th>
            </tr>
        </thead>
        <tbody>            
            @if ($completedTasks->count() == 0)
                <tr>
                    <td colspan="2" class="text-center">Нет завершенных задач</td>
                </tr>
            @else
                @foreach ($completedTasks as $task)
                    <tr class="{{$task->priority == 1 ? 'table-success' : ($task->priority == 2 ? 'table-warning' : 'table-danger')}}">
                        <td>{{$task->title}}</td>
                        <td>{{$task->description}}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>


