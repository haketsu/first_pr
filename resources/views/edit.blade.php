@extends('main')
@section('edit')
    <div>
        <form action="{{route('main.show', $client->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name_surname">ФИО</label>
                <input type="text" name="name_surname" class="form-control" id="name_surname"  placeholder="Введите имя" value="{{$client->name_surname}}" required>
            </div>
            <div class="form-group">
                <label for="sex">Пол</label>
                <td><input type="radio" name="sex" value="m" required/> Мужчина</td>
                <tr>
                    <td><input type="radio" name="sex" value="w" required/> Женщина</td>
                </tr>
            </div>
            <div class="form-group">
                <label for="phone_num">Телефон</label>
                <input type="tel" name="phone_num" class="form-control" id="phone_num"  placeholder="Введите телефон" value="{{$client->phone_num}}" required>
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <input type="text" name="address" class="form-control" id="address"  placeholder="Введите адрес" value="{{$client->address}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection
