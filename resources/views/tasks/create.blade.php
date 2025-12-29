<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавить задачу</title>
    <style>
        body {
            padding: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            max-width: 600px;
            padding: 8px;
            border: 1px solid #2b2b2bff;
            border-radius: 2px;
        }
        button {
            background-color: white;
            color: black;
            padding: 15px;
            margin: 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;

        }
        button:hover {
            background-color: #6384f1ff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: white;
        }
        .back {
            display: inline-block;
            background-color: white;
            color: black;
            padding: 15px;
            margin: 15px;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
        }
        .back:hover {
            background-color: #6384f1ff;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Добавить новую задачу</h1>
    </div>
    
    <div class="form-container">
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <div class="form">
                <label for="title">Название задачи:</label>
                <input type="text" id="title" name="title" required 
                       placeholder="Введите название задачи..." 
                       value="{{ old('title') }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="actions">
                <button type="submit" class="button">Добавить задачу</button>
                <a href="{{ route('tasks.index') }}" class="back">Назад</a>
            </div>
        </form>
    </div>
</body>
</html>

