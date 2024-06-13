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
            @foreach ($completedTasks as $task)
            <tr class="{{$task->priority == 1 ? 'table-success' : ($task->priority == 2 ? 'table-warning' : 'table-danger')}}">
                    <td>{{$task->title}}</td>
                    <td>{{$task->description}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


