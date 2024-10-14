<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>ToDoApplication</title>
</head>
<body>
    <header class="header">
        <nav>
            <div class="header__title">
                <h1 class="header__title--text">Todo</h1>
            </div>
        </nav>
    </header>
    <main class="main">
        @if (session('success'))
        <div class="create__success">
            {{ session('success') }}
        </div>
        @endif
        <div class="create">
            <form class="create__form" action="/todos" method="post">
            @csrf
                <div class="create__form-item">
                    <input class="create__form-item--input" type="text" name="todo_content">
                </div>
                <div class="create__form-submit">
                    <button class="create__form-submit--button" type="submit">作成</button>
                </div>
            </form>
        </div>
        <div class="list">
            <table class="table">
                <tr class="table__row">
                    <th class="tble__row-title">Todo</th>
                </tr>
                @foreach($recieved_todos as $recieved_todo)
                <tr class="table__row">
                    <td class="table__row--plan-name">
                        <form class="update-form">
                            <div class="update-form__rename">
                                <input type="text" class="update-form__rename-input" value="{{ $recieved_todo['todo_content'] }}">
                            </div>
                            <div class="update-form__button">
                                <button class="update-form__button--submit">更新</button>
                            </div>
                        </form>
                    </td>
                    <td class="table__row--delete">
                        <form class="delete-form">
                            <div class="delete-form__button">
                                <button class="delete-form__button--submit">削除</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
</body>
</html>

