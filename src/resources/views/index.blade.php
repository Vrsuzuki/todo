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
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <div class="create__error">
                    {{ $error}}
                </div>
            @endforeach
        @endif
        <div class="create">
            <form class="create__form" action="/todos" method="POST">
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
                @foreach($received_todos as $received_todo)
                <tr class="table__row">
                    <td class="table__row--plan-name">
                        <form class="update-form" action="/todos/update" method="POST">
                        @method('PATCH')
                        @csrf
                            <div class="update-form__rename">
                                <input class="update-form__rename-input" type="text" name="todo_content" value="{{ $received_todo['todo_content'] }}">
                                <input type="hidden" name="todo_id" value="{{ $received_todo['id'] }}">
                            </div>
                            <div class="update-form__button">
                                <button class="update-form__button--submit">更新</button>
                            </div>
                        </form>
                    </td>
                    <td class="table__row--delete">
                        <form class="delete-form"  action="/todos/delete" method="POST">
                        @method('DELETE')
                        @csrf
                            <div class="delete-form__button">
                                <input type="hidden" name="todo_id" value="{{ $received_todo['id'] }}">
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

