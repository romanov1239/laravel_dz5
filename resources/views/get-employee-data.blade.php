<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Data</title>
</head>
<body>

@if(session('employee') && session('employee')['id'])
    <div class="employee-details">
        <h1>Информация о работнике</h1>
        <p><strong>ID:</strong> {{ session('employee')['id'] }}</p>
        <p><strong>Имя:</strong> {{ session('employee')['name'] }}</p>
        <p><strong>Email:</strong> {{ session('employee')['email'] }}</p>
        <p><strong>Фамилия:</strong> {{ session('employee')['surname'] }}</p>
        <p><strong>Должность:</strong> {{ session('employee')['position'] }}</p>
        <p><strong>Адрес:</strong> {{ session('employee')['address'] }}</p>
        <p><strong>Хобби:</strong> {{ session('employee')['hobby'] }}</p>
        <p><strong>Отдел:</strong> {{ session('employee')['department'] }}</p>
        <p><strong>Путь запроса:</strong> {{ session('employee')['path'] }}</p>
        <p><strong>URL запроса:</strong> {{ session('employee')['url'] }}</p>
    </div>

    <h2>Редактировать данные работника</h2>
    <form name="employee-edit-form" id="employee-edit-form" method="post" action="{{ url('/user/' . session('employee')['id']) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя работника</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ session('employee')['name'] }}" required="true">
        </div>
        <div class="form-group">
            <label for="email">Email работника</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ session('employee')['email'] }}" required="true">
        </div>
        <div class="form-group">
            <label for="surname">Фамилия работника</label>
            <input type="text" id="surname" name="surname" class="form-control" value="{{ session('employee')['surname'] }}" required="true">
        </div>
        <div class="form-group">
            <label for="position">Занимаемая должность</label>
            <input type="text" id="position" name="position" class="form-control" value="{{ session('employee')['position'] }}" required="true">
        </div>
        <div class="form-group">
            <label for="address">Адрес проживания</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ session('employee')['address'] }}" required="true">
        </div>
        <div class="form-group">
            <label for="json_data">JSON Data</label>
            <textarea id="json_data" name="json_data" class="form-control" required="true">@json(['hobby' => session('employee')['hobby'], 'department' => session('employee')['department']], JSON_PRETTY_PRINT)</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endif

<h2>Введите данные нового работника</h2>
<form name="employee-form" id="employee-form" method="post" action="{{ url('store-form') }}">
    @csrf
    <div class="form-group">
        <label for="name">Имя работника</label>
        <input type="text" id="name" name="name" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="email">Email работника</label>
        <input type="email" id="email" name="email" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="surname">Фамилия работника</label>
        <input type="text" id="surname" name="surname" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="position">Занимаемая должность</label>
        <input type="text" id="position" name="position" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="address">Адрес проживания</label>
        <input type="text" id="address" name="address" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="json_data">JSON Data</label>
        <textarea id="json_data" name="json_data" class="form-control" required="true"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>

</body>
</html>
