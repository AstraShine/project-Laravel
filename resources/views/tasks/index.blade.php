<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
    <style>
        body {
            padding: 20px;
        }
        h1 {
            padding: 20px;
        }
        ul {
            max-width: 1000px;
            list-style: none;
            padding: 0;
        }
        li {
            padding: 10px;
            background-color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .add {
            display: inline-block;
            background-color: white;
            color: black;
            padding: 15px;
            border-radius: 4px;
            text-decoration: none;
        }
        .add:hover {
            background-color: #5b79daff;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .toggle {
            background: none;
            border: 2px solid white;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            cursor: pointer;
        }
        .content {
            flex-grow: 1;
            margin: 0 20px;
            font-size: 16px;
        }
        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .delete {
            background: white;
            color: black;
            padding: 6px 12px;
            font-size: 12px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }
        .delete:hover {
            background: #5373ddff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: white;
        }
    </style>
</head>
<body>


    <div class="header">
        <h1>Список задач</h1>
    </div>
        <ul>
            @foreach($tasks as $task)
                <li class="{{ $task->isCompleted() ? 'completed' : '' }}">
                    <button class="toggle {{ $task->isCompleted() ? 'completed' : '' }}" 
                            onclick="location.href='{{ route('tasks.toggle', $task->getId()) }}'">
                        {{ $task->isCompleted() ? "✔️" : "❌"}}
                    </button>
                    
                    <div class="content">
                        {{ htmlspecialchars($task->getTitle()) }}
                    </div>
                    
                    <div class="actions">
                        <form method="POST" action="{{ route('tasks.destroy', $task->getId()) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete" 
                                    onclick="return confirm('Удалить задачу?')">
                                Удалить
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('tasks.create') }}" class="add">+ Добавить задачу</a>
</body>
</html>