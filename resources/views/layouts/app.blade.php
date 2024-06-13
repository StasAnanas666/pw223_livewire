<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire Project</title>
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>

    <nav class="mb-5 bg-dark py-3 sticky-top">
        <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link text-light" href="{{route("tasks")}}" wire:navigate>Задачи</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="{{route("completed-tasks")}}" wire:navigate>Выполненные задачи</a>
            </li>
          </ul>
    </nav>

    <main>
      {{$slot}}
    </main>

    
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>